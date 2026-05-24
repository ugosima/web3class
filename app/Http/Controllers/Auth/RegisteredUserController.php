<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Services\ReferralCodeService;


class RegisteredUserController extends Controller
{

public function create($slug = null)
{
     $referralCode = null;
     $isValidReferral = null;

    if (!empty($slug)) {
        $user = User::where('referral_code', $slug)->first();
        $referralCode = $slug;

        if ($user) {
            $isValidReferral = true;
        }
        else {
                $isValidReferral = false;

        }
    }

    return view('auth.register', [
        'authMode' => 'register',
        'referralCode' => $referralCode ?? null,
        'isValidReferral' => $isValidReferral ?? null
    ]);
}

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
  public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'referral_code' => ['nullable', 'string', 'max:20'],
    ]);

    $code = null;

    if ($request->referral_code) {
        $code = strtoupper(trim($request->referral_code));
    }

    $user = DB::transaction(function () use ($request, $code) {

        $referrer = null;

        if ($code) {
            $referrer = User::where('referral_code', $code)->first();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'authcreatetype' => 'local',
            'referrer' => $referrer?->referral_code,
        ]);

        // generate referral code immediately after creation
        $user->update([
            'referral_code' => ReferralCodeService::generate($user),
        ]);

        // reward referrer safely
        if ($referrer && $referrer->referral_points < 15000) {
            $referrer->increment('referral_points', 3);
        }

        return $user;
    });

    event(new Registered($user));

    Auth::login($user);
    return redirect(route('dashboard', absolute: false));


}
}
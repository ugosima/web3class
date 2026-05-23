<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Services\ReferralCodeService;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
//   public function create($slug = null)
// {
//     $referralCode = null;
//     $isValidReferral = false;

//     if ($slug && User::where('referral_code', $slug)->exists()) {
//         $referralCode = $slug;
//         $isValidReferral = true;
//     }

//     return view('auth.register', [
//         'authMode' => 'register',
//         'referralCode' => $referralCode,
//         'isValidReferral' => $isValidReferral
//     ]);
// }

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
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'referral_code' => ['nullable', 'string', 'max:20'],
    ]);

    // --------------------------------------
    // 1. check referral code (optional)
    // --------------------------------------
    $referrer = null;

    if ($request->referral_code) {
        $code = strtoupper(trim($request->referral_code));
        $referrer = User::where('referral_code', $code)->first();
    }

    // --------------------------------------
    // 2. create user first (without code)
    // --------------------------------------
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'authcreatetype' => 'local',
        'referrer' => $referrer?->referral_code, 
    ]);

    // --------------------------------------
    // 3. generate UNIQUE referral code
    // --------------------------------------
    $user->referral_code = ReferralCodeService::generate($user);
    $user->save();

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('dashboard', absolute: false));
}
}

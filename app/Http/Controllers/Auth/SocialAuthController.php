<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Services\ReferralCodeService;

class SocialAuthController extends Controller
{
     /**
     * Redirect to Google.
     */
    public function redirectToGoogle(Request $request): RedirectResponse
    {
        $referralCode = strtoupper(trim((string) $request->query('referral_code')));

        if ($referralCode && User::where('referral_code', $referralCode)->exists()) {
            $request->session()->put('google_referral_code', $referralCode);
        } else {
            $request->session()->forget('google_referral_code');
        }

        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback from Google.
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $referralCode = session()->pull('google_referral_code');

            $user = DB::transaction(function () use ($googleUser, $referralCode) {
                $existingUser = User::where('email', $googleUser->getEmail())->first();

                if ($existingUser) {
                    return $existingUser;
                }

                $referrer = $referralCode
                    ? User::where('referral_code', $referralCode)->first()
                    : null;

                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'authcreatetype' => 'google',
                    'password' => bcrypt(str()->random(16)),
                    'referrer' => $referrer?->referral_code,
                ]);

                $user->update([
                    'referral_code' => ReferralCodeService::generate($user),
                ]);

                if ($referrer && $referrer->referral_points < 15000) {
                    $referrer->increment('referral_points', 3);
                }

                return $user;
            });

            Auth::login($user);

            return redirect()->intended(route('dashboard', absolute: false));

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Google login failed, please try again.',
            ]);
        }
    }
}

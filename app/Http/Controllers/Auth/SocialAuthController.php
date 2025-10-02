<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect to Google.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback from Google.
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $authtype = 'google'; ///Googlelogin

            // Find or create user
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'authcreatetype' => $authtype,
                    'password' => bcrypt(str()->random(16)), // random password
                ]
            );

            Auth::login($user);

            return redirect()->intended(route('dashboard', absolute: false));

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Google login failed, please try again.',
            ]);
        }
    }
}

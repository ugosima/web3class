<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validate login fields
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Try to find the user by email
        $user = User::where('email', $request->email)->first();

        // If user does not exist → generic message
        if (! $user) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'), // "credentials do not match."
            ]);
        }

        // If email exists but password is wrong → specific message
        if (! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => __('auth.password'), // "The provided password is incorrect."
            ]);
        }

        // Credentials correct → log in
        Auth::login($user, $request->boolean('remember'));

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

@php
    $initialAuthMode = in_array($authMode ?? 'login', ['login', 'register'], true) ? $authMode : 'login';
    $referralCode = $referralCode ?? null;
    $isValidReferral = $isValidReferral ?? null;
@endphp

<div
    x-data="{ mode: '{{ $initialAuthMode }}' }"
    class="space-y-6"
>
    <x-auth-session-status class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800" :status="session('status')" />

    <div class="text-center">
        <h2 class="mt-2 text-3xl font-black text-emerald-800" > WELCOME!</h2>
        {{-- <h2 class="mt-2 text-3xl font-black text-slate-950" x-text="mode === 'login' ? 'Log In' : 'Create Account'"></h2> --}}
    </div>

    <div class="grid grid-cols-2 rounded-xl border border-slate-200 bg-slate-100 p-1">
        <button
            type="button"
            @click="mode = 'login'"
            :class="mode === 'login' ? 'bg-slate-950 text-white shadow' : 'text-slate-600 hover:text-slate-950'"
            class="rounded-lg px-4 py-3 text-sm font-black uppercase transition"
        >
            Login
        </button>
        <button
            type="button"
            @click="mode = 'register'"
            :class="mode === 'register' ? 'bg-emerald-500 text-slate-950 shadow' : 'text-slate-600 hover:text-slate-950'"
            class="rounded-lg px-4 py-3 text-sm font-black uppercase transition"
        >
            Register
        </button>
    </div>

    <form method="POST" action="{{ route('login') }}" x-show="mode === 'login'" x-cloak>
        @csrf

        <div>
            <x-input-label for="login_email" :value="__('Email')" class="text-sm font-bold uppercase text-slate-700" />
            <x-text-input id="login_email" class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 transition focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />

            @if ($errors->get('email'))
                @foreach ($errors->get('email') as $error)
                    @if ($error === __('auth.failed'))
                        <button
                            type="button"
                            @click="mode = 'register'"
                            class="mt-3 rounded-lg bg-emerald-500 px-4 py-2 text-xs font-bold uppercase text-white transition hover:bg-emerald-600"
                        >
                            Create Account
                        </button>
                    @endif
                @endforeach
            @endif
        </div>

        <div class="mt-4">
            <x-input-label for="login_password" :value="__('Password')" class="text-sm font-bold uppercase text-slate-700" />
            <x-text-input id="login_password" class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 transition focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <div class="mt-4">
            <label for="remember_me" class="inline-flex items-center gap-2">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" name="remember">
                <span class="text-sm font-semibold text-slate-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-8 flex flex-col items-center justify-between gap-4 sm:flex-row">
            @if (Route::has('password.request'))
                <a class="text-sm font-bold text-slate-600 transition hover:text-emerald-600" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @else
                <div></div>
            @endif

            <button type="submit" class="w-full rounded-lg bg-emerald-500 px-8 py-3 font-black uppercase text-slate-950 shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400 sm:w-auto">
                {{ __('Log In') }}
            </button>
        </div>
    </form>

    <form method="POST" action="{{ route('register') }}" x-show="mode === 'register'" x-cloak>
        @csrf

        <div>
            <x-input-label for="register_name" :value="__('Name')" class="text-sm font-bold uppercase text-slate-700" />
            <x-text-input id="register_name" class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 transition focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" type="text" name="name" :value="old('name')" required autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <div class="mt-4">
            <x-input-label for="register_email" :value="__('Email')" class="text-sm font-bold uppercase text-slate-700" />
            <x-text-input id="register_email" class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 transition focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <div class="mt-4">
            <x-input-label for="register_password" :value="__('Password')" class="text-sm font-bold uppercase text-slate-700" />
            <x-text-input id="register_password" class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 transition focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <div class="mt-4">
            <x-input-label for="register_password_confirmation" :value="__('Confirm Password')" class="text-sm font-bold uppercase text-slate-700" />
            <x-text-input id="register_password_confirmation" class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 transition focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

           <div class="mt-4">

                <label class="text-sm font-bold uppercase text-slate-700">
                    referral code (optional)
                </label>

                <input 
                    type="text"
                    name="referral_code"
                    value="{{ old('referral_code', $referralCode) }}"
                    class="mt-2 block w-full rounded-lg border border-slate-300 px-4 py-3 transition focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20"
                    placeholder="enter referral code"
                />

                @if($referralCode)
                    @if($isValidReferral)
                        <p class="text-sm text-emerald-600 font-semibold">
                            ✓ valid referral code
                        </p>
                    @else
                        <p class="text-sm text-red-600 font-semibold">
                            ✕ invalid referral code
                        </p>
                    @endif
                @else
                    <p class="text-xs text-slate-500">
                        referral code is optional
                    </p>
                @endif

    </div>

        <div class="mt-8 flex flex-col items-center justify-between gap-4 sm:flex-row">
            <button type="button" @click="mode = 'login'" class="text-sm font-bold text-slate-600 transition hover:text-emerald-600">
                {{ __('Already registered?') }}
            </button>

            <button type="submit" class="w-full rounded-lg bg-emerald-500 px-8 py-3 font-black uppercase text-slate-950 shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400 sm:w-auto">
                {{ __('Register') }}
            </button>
        </div>
    </form>

    <br>
</div>

<x-guest-layout class="space-y-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf


        <div>
            <h2 class="text-3xl font-bold text-center py-4 text-slate-900 border-b-2 border-emerald-500/30">{{ __('LOGIN') }}</h2>
        </div>
    


        <!-- Email Address -->
        <div class="mt-6">
            <x-input-label for="email" :value="__('Email')" class="text-lg text-slate-700 font-semibold" />
            <x-text-input id="email" class="block mt-2 w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            @if ($errors->get('email'))
                @foreach ($errors->get('email') as $error)
                    @if ($error === __('auth.failed'))
                        <a href="{{ route('register') }}"
                        class="ml-0 mt-3 inline-block bg-emerald-500 hover:bg-emerald-600 text-white text-xs px-4 py-2 rounded-lg transition font-medium">
                        Create Account
                        </a>
                    @endif
                @endforeach
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-lg text-slate-700 font-semibold" />

            <x-text-input id="password" class="block mt-2 w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition"
                            type="password"
                            name="password" autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center gap-2">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" name="remember">
                <span class="text-lg text-blue-500">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-8">
            @if (Route::has('password.request'))
                <a class="text-xl text-red-900 hover:text-gray-900 transition font-medium" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @else
                <div></div>
            @endif

            <x-primary-button class="w-full sm:w-auto bg-emerald-500 hover:bg-emerald-600 focus:ring-emerald-500 text-3xl text-gray-900 font-bold px-9 py-3 rounded-lg transition transform hover:scale-105 duration-300 shadow-lg shadow-emerald-500/30">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

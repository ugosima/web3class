<x-guest-layout class="space-y-4">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <h2 class="text-3xl font-bold text-center py-4 text-slate-900 border-b-2 border-emerald-500/30">{{ __('REGISTER') }}</h2>
        </div>
        

        <div class="mt-6">
            <x-input-label for="name" :value="__('Name')" class="text-lg text-slate-700 font-bold" />
            <x-text-input id="name" class="block mt-2 w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>
       

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-lg text-slate-700 font-semibold" />
            <x-text-input id="email" class="block mt-2 w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-lg text-slate-700 font-semibold" />

            <x-text-input id="password" class="block mt-2 w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg text-slate-700 font-semibold" />

            <x-text-input id="password_confirmation" class="block mt-2 w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-8">
            <a class="text-lg text-blue-700 hover:text-emerald-600 transition font-medium" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="w-full sm:w-auto bg-emerald-500 hover:bg-emerald-600 focus:ring-emerald-500 text-white font-semibold px-8 py-3 rounded-lg transition transform hover:scale-105 duration-300 shadow-lg shadow-emerald-500/30">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

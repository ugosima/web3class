<x-guest-layout>
            <div class="flex items-center justify-center mt-2 px-4 py-4 border-2 border-gray-300 rounded-lg">
                        <h2 class="flex font-semibold text-xl fit-content justify center">FORGOTTEN PASSWORD</h2>
            </div>
    <br>
    <div class="mb-4 text-sm text-gray-700 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Enter your email address and we will send you a password reset link.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button>
                {{ __('Email Reset Link') }}
            </x-primary-button>
        </div>
    </form>

    
    <br>
</x-guest-layout>

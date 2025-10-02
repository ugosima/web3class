 @if (Auth::user() && Auth::user()->authcreatetype === 'google')
   
        <form method="POST" action="{{ route('password.set') }}">
            @csrf

            <div>
                <p class="text-gray-500">
                    Set a password for your account ({{ Auth::user()->email }}) to enable login without Google.
                </p>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Set Password') }}
                </x-primary-button>


                @if (session('status') === 'password-set')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Password set successfully.') }}</p>
                @endif





            </div>
        </form>
    @endif

       
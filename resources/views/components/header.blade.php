
         <header class="bg-blue-50 sticky top-0 z-50 dark:bg-gray-900 dark:text-gray-200">
        <div class="py-4 flex justify-between">
                  <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:-my-px sm:ms-10 sm:flex ">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" class="font-bold">
                       <div class="text-4xl font-bold text-gray-900 dark:text-gray-300 dark:bg-gray-900 dark:px-4  dark:rounded-lg">
                         {{ __('TOKEN') }}<span class="text-green-600">{{ __('DEMY') }}</span>
                       </div>
                    </x-nav-link>
                </div>
                    
         </div>
        </div>
    </header>
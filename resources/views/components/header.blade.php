
    <header class=" sticky top-0 z-50 bg-gray-900 text-gray-200">
        <div class="py-4 flex justify-between">
                <div class="flex gap-1">

                    <!-- title and logo Links -->
                    <div class="hidden sm:-my-px sm:ms-10 sm:flex flex items-center ">
                        <a href="{{ route('welcome') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                            {{-- <img src="{{ asset('images/tdlogo.jpeg') }}" alt="logo" class="h-9 w-auto fill-current text-gray-800 dark:text-gray-200"> --}}
                        </a> 
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" class="font-bold">
                        <div class="text-4xl font-bold text-gray-300 -ml-1">
                            &nbsp;{{ __('TOKEN') }}<span class="text-green-600">{{ __('DEMY') }}</span>
                        </div>
                        </x-nav-link>
                    </div>
                    
                </div>
        </div>
    </header>
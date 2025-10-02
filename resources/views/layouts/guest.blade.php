<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-[Inter] text-gray-800 leading-relaxed ">
        <x-header/>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-blue-50 border-2 border-gray-200 text-black dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

            <div>
                <a href="{{ route('google.redirect') }}"
		class="w-full flex items-center justify-center px-4 py-2 mt-3 bg-red-500 hover:bg-red-600 text-white rounded-md">
		<img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
			class="w-5 h-5 mr-2" alt="Google">
		Continue with Google
	     </a>

            </div>
        </div>
        <x-footer/>
    </body>
</html>

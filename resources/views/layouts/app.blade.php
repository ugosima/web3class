<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html-root">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('auth.partials.seo-meta')
        
        {{$metatags ?? ''}}
        <title>{{ config('app.name', 'TOKENDEMY') }} | {{$title ?? ''}}</title>
        {{-- <link rel="icon" type="image/png" href="{{ asset('faviconx.png') }}"> --}}

<link rel="icon" type="image/svg+xml" href="/favicon.svg">  
<link
    rel="icon"
    type="image/svg+xml"
    href="/favicon2.svg"
    media="(prefers-color-scheme: dark)"
>      
<meta name="theme-color" content="#020617">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- Scripts -->
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
    </head>
   <body class="font-[Inter] text-gray-200 leading-relaxed flex flex-col min-h-screen bg-gray-900">
        <div class="flex flex-col min-h-screen bg-gray-900">
            @include('layouts.navigation')

            @if (session('error'))
                <div class="mx-auto mt-4 w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div role="alert" class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gray-900 shadow">
                    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>


            @include('components.footer')
        </div>
    </body>
</html>

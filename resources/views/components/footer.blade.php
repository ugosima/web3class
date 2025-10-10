
@props([
    // Light mode defaults
    'bgColor' => null,
    'textColor' => null,
    'accentColor' => null,
])

@php
    // Default colors if not overridden
    $resolvedBg = $bgColor ?? 'bg-blue-50 dark:bg-gray-900';
    $resolvedText = $textColor ?? 'text-black dark:text-gray-300';
    $resolvedAccent = $accentColor ?? 'text-red-600 dark:text-red-400';
@endphp

<footer class="{{ $resolvedBg }}">
    <br><br>
    <nav class="border-t border-gray-300 flex flex-row justify-around px-2 pt-4 {{ $resolvedText }}">
        <!-- Company -->
        <div class="flex flex-col space-y-4">
            <h4 class="{{ $resolvedAccent }} font-bold"><a href="#">COMPANY</a></h4>
            <h4><a href="{{ route('company', 'about') }}">About us</a></h4>
            <h4><a href="{{ route('company', 'terms') }}">Terms</a></h4>
            <h4><a href="{{ route('company', 'disclaimer') }}">Disclaimer</a></h4>
        </div>

        <!-- Support -->
        <div class="flex flex-col space-y-4">
            <h4 class="{{ $resolvedAccent }} font-bold"><a href="#">SUPPORT</a></h4>
            <h4><a href="{{ route('company', 'contact') }}">Contact support</a></h4>
            <h4><a href="{{ route('company', 'developers') }}">Developers</a></h4>
            <h4><a href="{{ route('company', 'glossary') }}">Glossary</a></h4>
        </div>

        <!-- Socials -->
        <div class="flex flex-col space-y-4">
            <h4 class="{{ $resolvedAccent }} font-bold"><a href="#">SOCIALS</a></h4>
            <h4><a href="#">Facebook</a></h4>
            <h4><a href="#">LinkedIn</a></h4>
            <h4><a href="#">Twitter</a></h4>
        </div>
    </nav>

    <br><br>
    <div class="w-full text-center py-4 text-sm {{ $resolvedText }}">
        © Copyright 2025 Codebridge-developers
    </div>
</footer>

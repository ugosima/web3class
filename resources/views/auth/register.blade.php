<x-guest-layout>
    @include('auth.partials.login-register', ['authMode' => $authMode ?? 'register'])
</x-guest-layout>

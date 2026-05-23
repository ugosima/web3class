<x-guest-layout>
    @include('auth.partials.login-register', ['authMode' => $authMode ?? 'login'])
</x-guest-layout>

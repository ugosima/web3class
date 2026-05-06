@props(['value'])

<label {{ $attributes->merge(['class' => 'block  font-bold text-2xl text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>

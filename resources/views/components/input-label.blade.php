@props(['value'])

<label {{ $attributes->merge(['class' => 'block  font-medium text-sxl text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>

@props(['color' => 'text-green-600', 'size' => 'w-12 h-12'])

<svg {{ $attributes->merge(['class' => "$color $size"]) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
</svg>

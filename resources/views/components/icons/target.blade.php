@props(['color' => 'text-red-500', 'size' => 'w-12 h-12'])

<svg {{ $attributes->merge(['class' => "$color $size"]) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <circle cx="12" cy="12" r="1"></circle>
  <circle cx="12" cy="12" r="5"></circle>
  <circle cx="12" cy="12" r="9"></circle>
</svg>

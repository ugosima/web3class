@props(['color' => 'text-orange-600', 'size' => 'w-12 h-12'])

<svg {{ $attributes->merge(['class' => "$color $size"]) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M6 9H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-2"></path>
  <path d="M6 9a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2"></path>
  <rect x="6" y="9" width="12" height="8"></rect>
  <path d="M8 17v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2"></path>
  <line x1="10" y1="21" x2="14" y2="21"></line>
</svg>

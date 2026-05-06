@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 bg-gray-200  text-2xl text-gray-800 focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm']) }}>


@props([
    'filename',
    'alt' => '',
])

<img
    src="{{ route('lesson.image', ['filename' => $filename]) }}"
    alt="{{ $alt }}"
    {{ $attributes }}
>

@props([
    'maxWidth' => null,
    'sticky' => false,
])
@php
    $maxWidth = [
        'xs' => 'md:max-w-xs',
        'sm' => 'md:max-w-sm',
        'md' => 'md:max-w-md',
        'lg' => 'md:max-w-lg',
        'xl' => 'md:max-w-xl',
        '2xl' => 'md:max-w-2xl',
        '3xl' => 'md:max-w-3xl',
        '4xl' => 'md:max-w-4xl',
        '5xl' => 'md:max-w-5xl',
        'full' => 'max-w-full',
    ][$maxWidth ?? '2xl'];
@endphp
<div @class([
    'flex flex-col gap-y-4 w-full mb-2',
    $maxWidth,
    'sticky top-0 md:h-[calc(100vh-197px)] overflow-hidden overflow-y-auto lm-scroll-hidden' => $sticky,
])>
    {{ $slot }}
</div>

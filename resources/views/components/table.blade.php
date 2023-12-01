@php
    $textSize = [
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'base' => 'text-base',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        '2xl' => 'text-2xl',
    ][$textSize ?? 'xs'];
@endphp
<table @class([
    'table w-full table-auto border-separate text-start border-spacing-0 whitespace-nowrap',
    $textSize,
])>
    {{ $slot }}
</table>

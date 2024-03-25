@props(['breakpoint'])
@php
    $breakpoint = [
        'xs' => 'xs:col-span-3',
        'sm' => 'sm:col-span-3',
        'md' => 'md:col-span-3',
        'lg' => 'lg:col-span-3',
        'xl' => 'xl:col-span-3',
    ][$breakpoint ?? 'md'];
@endphp
<div @class([$breakpoint])>
    {{ $slot }}
</div>

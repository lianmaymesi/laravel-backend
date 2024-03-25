@props(['breakpoint'])
@php
    $breakpoint = [
        'xs' => 'xs:col-span-2',
        'sm' => 'sm:col-span-2',
        'md' => 'md:col-span-2',
        'lg' => 'lg:col-span-2',
        'xl' => 'xl:col-span-2',
    ][$breakpoint ?? 'md'];
@endphp
<div @class([$breakpoint])>
    {{ $slot }}
</div>

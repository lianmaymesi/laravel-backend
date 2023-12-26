@props(['href', 'xs' => false, 'noNavigate' => false])
<a @if (!$noNavigate) wire:navigate @endif href="{{ $href }}" @class([
    'flex items-center text-sm rounded-lg bg-red-600 px-3 h-[30px] font-medium leading-none text-red-100 duration-150 hover:bg-red-700 hover:text-red-50 decoration-0 justify-center',
])
    {{ $attributes }}>
    {{ $slot }}
</a>

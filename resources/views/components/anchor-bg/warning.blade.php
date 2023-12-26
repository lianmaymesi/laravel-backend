@props(['href', 'noNavigate' => false])
<a @if (!$noNavigate) wire:navigate @endif href="{{ $href }}" @class([
    'flex items-center text-sm rounded-lg bg-orange-600 px-3 h-[30px] font-medium leading-none text-orange-100 duration-150 hover:bg-orange-700 hover:text-orange-50 decoration-0 justify-center',
])
    {{ $attributes }}>
    {{ $slot }}
</a>

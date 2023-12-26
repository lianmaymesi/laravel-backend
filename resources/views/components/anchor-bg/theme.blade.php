@props(['href', 'noNavigate' => false])
<a @if (!$noNavigate) wire:navigate @endif href="{{ $href }}" @class([
    'flex items-center text-sm rounded-lg bg-indigo-600 px-3 h-[30px] font-medium leading-none text-indigo-100 duration-150 hover:bg-indigo-700 hover:text-indigo-50 decoration-0 justify-center',
])
    {{ $attributes }}>
    {{ $slot }}
</a>

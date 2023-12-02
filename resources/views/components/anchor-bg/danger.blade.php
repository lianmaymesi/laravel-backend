@props(['href', 'xs' => false, 'noNavigate' => false])
<a @if (!$noNavigate) wire:navigate @endif href="{{ $href }}" @class([
    'rounded-full bg-red-600 px-3 py-1 font-medium leading-none text-red-50 duration-150 hover:bg-red-700',
])
    {{ $attributes }}>
    {{ $slot }}
</a>

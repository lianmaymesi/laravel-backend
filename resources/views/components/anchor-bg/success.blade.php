@props(['href', 'noNavigate' => false])
<a @if (!$noNavigate) wire:navigate @endif href="{{ $href }}" @class([
    'rounded-full bg-green-600 px-3 py-1 font-medium leading-none text-green-50 duration-150 hover:bg-green-700',
])
    {{ $attributes }}>
    {{ $slot }}
</a>

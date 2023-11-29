@props(['href', 'xs' => false, 'noNavigate' => false])
<a @if (!$noNavigate) wire:navigate @endif href="{{ $href }}" @class([
    'rounded-full bg-indigo-600 px-3 py-1 text-sm font-medium leading-none text-indigo-50 duration-150 hover:bg-indigo-700',
    'text-xs' => $xs,
])
    {{ $attributes }}>
    {{ $slot }}
</a>

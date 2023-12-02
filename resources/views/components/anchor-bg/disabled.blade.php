@props(['href', 'noNavigate' => false])
<a @if (!$noNavigate) wire:navigate @endif href="{{ $href }}" @class([
    'rounded-full bg-slate-600 px-3 py-1 font-medium leading-none text-slate-50 duration-150 hover:bg-slate-700',
])
    {{ $attributes }}>
    {{ $slot }}
</a>

@props(['href', 'noNavigate' => false])
<a @if (!$noNavigate) wire:navigate @endif href="{{ $href }}" @class([
    'flex items-center text-sm rounded-lg bg-slate-600 px-3 h-[30px] font-medium leading-none text-slate-100 duration-150 hover:bg-slate-700 hover:text-slate-50 decoration-0 justify-center',
])
    {{ $attributes }}>
    {{ $slot }}
</a>

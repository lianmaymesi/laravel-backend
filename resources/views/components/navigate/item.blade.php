@props(['route', 'is_active' => false])
<li>
    <a href="{{ $route }}" wire:navigate @class([
        'flex items-center rounded-lg p-2 text-sm font-medium leading-none hover:bg-indigo-700 hover:text-indigo-50',
        'bg-indigo-700 text-indigo-50' => $is_active,
        'text-slate-700' => !$is_active,
    ])>
        {{ $slot }}
    </a>
</li>

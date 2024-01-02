@props(['route', 'is_active' => false, 'noNavigate' => false, 'path'])
<li>
    <a href="{{ $route }}" @if (!$noNavigate) wire:navigate @endif
        class="flex items-center rounded-lg p-2 text-sm font-medium leading-none hover:bg-indigo-700 hover:text-indigo-50"
        x-bind:class="$current('{{ $path }}') ? 'bg-indigo-700 text-indigo-50' : 'text-slate-700'">
        {{ $slot }}
    </a>
</li>

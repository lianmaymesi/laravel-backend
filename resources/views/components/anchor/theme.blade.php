@props(['href'])
<a wire:navigate href="{{ $href }}" class="text-sm font-medium text-indigo-600 duration-150 hover:underline">
    {{ $slot }}
</a>

@props(['href', 'icon'])
<a wire:navigate href="{{ $href }}"
    class="font-medium leading-none text-indigo-600 duration-150 hover:text-indigo-700 hover:underline">
    <div class="flex items-center space-x-1">
        @if (isset($icon))
            {{ $icon }}
        @endif
        <span class="pt-[1.5px]">
            {{ $slot }}
        </span>
    </div>
</a>

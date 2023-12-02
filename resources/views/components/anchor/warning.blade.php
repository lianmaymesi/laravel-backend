@props(['href', 'icon'])
<a wire:navigate href="{{ $href }}"
    class="font-medium leading-none text-orange-600 duration-150 hover:text-orange-700 hover:underline">
    <div class="flex items-center space-x-1">
        @if (isset($icon))
            {{ $icon }}
        @endif
        <span class="pt-[1.5px]">
            {{ $slot }}
        </span>
    </div>
</a>

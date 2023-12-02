@props(['href', 'icon'])
<a wire:navigate href="{{ $href }}"
    class="font-medium leading-none text-green-600 duration-150 hover:text-green-700 hover:underline">
    <div class="flex items-center space-x-1">
        @if (isset($icon))
            {{ $icon }}
        @endif
        <span class="pt-[1.5px]">
            {{ $slot }}
        </span>
    </div>
</a>

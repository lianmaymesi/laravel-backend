@props(['href', 'icon', 'noNavigate' => false])
<a @if (!$noNavigate) wire:navigate @endif href="{{ $href }}"
    class="font-medium leading-none text-red-600 duration-150 hover:text-red-700 hover:underline">
    <div class="flex items-center gap-x-1">
        @if (isset($icon))
            {{ $icon }}
        @endif
        <span class="pt-[1.5px]">
            {{ $slot }}
        </span>
    </div>
</a>

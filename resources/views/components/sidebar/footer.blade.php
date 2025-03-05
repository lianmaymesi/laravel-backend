@props(['savingProgress' => true])
<footer class="relative flex-auto p-4 bg-white border-t touch-auto z-99999">
    <div class="flex items-center justify-between space-x-2">
        @if ($savingProgress)
            <span wire:loading {{ $attributes->whereStartsWith('wire:target') }} @class(['text-sm'])>
                Saving
            </span>
            <span x-data="{ open: false }" x-init="@this.on('notify-saved', (event) => {
                setTimeout(() => { open = false }, 2500);
                open = true;
            })" x-show:transition.out.duration.1000ms="open"
                style="display: none" class="text-sm text-slate-600">
                Saved!
            </span>
        @endif
        @if (isset($customClose))
            {{ $customClose }}
        @else
            <x-lb::buttons-bg.disabled x-on:click="show = !show" type="button">
                Close
            </x-lb::buttons-bg.disabled>
        @endif
        {{ $slot }}
    </div>
</footer>

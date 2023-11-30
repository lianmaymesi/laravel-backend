<footer class="relative flex-auto touch-auto p-4">
    <div class="flex items-center justify-end space-x-2">
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
        {{ $slot }}
    </div>
</footer>

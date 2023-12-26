@props([
    'maxWidth' => null,
    'id' => null,
    'savingProgress' => true,
])
<x-lb::modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="sticky top-0 z-[999999] w-full bg-slate-100 p-4 text-lg font-medium">
        @if (isset($header))
            {{ $header }}
        @endif
    </div>
    <div class="bg-slate-50">
        @if (isset($body))
            {{ $body }}
        @endif
    </div>
    <div class="sticky bottom-0 flex items-center justify-end space-x-2 bg-gray-100 p-4">
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
        @if (isset($button))
            {{ $button }}
        @endif
    </div>
</x-lb::modal>

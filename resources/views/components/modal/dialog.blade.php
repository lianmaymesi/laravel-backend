@props([
    'maxWidth' => null,
    'id' => null,
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
    <div class="sticky bottom-0 flex justify-end space-x-2 bg-gray-100 p-4">
        <x-lb::buttons-bg.disabled x-on:click="show = !show" type="button">
            Close
        </x-lb::buttons-bg.disabled>
        @if (isset($button))
            {{ $button }}
        @endif
    </div>
</x-lb::modal>

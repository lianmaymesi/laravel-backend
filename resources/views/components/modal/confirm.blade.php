@props([
    'maxWidth' => null,
    'id' => null,
    'title' => null,
    'button',
])
<x-lb::modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="p-8 text-center">
        <div class="flex justify-center">
            <span class="rounded-full bg-slate-100 p-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                    stroke="currentColor" class="h-7 w-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </span>
        </div>
        <h2 x-dialog:title class="mt-2 text-xl font-bold">Delete {{ $title }}</h2>
        <p class="mt-1 text-gray-600">Are you sure you would like delete?</p>
    </div>
    <div class="flex justify-center space-x-2 bg-gray-50 p-4">
        <x-lb::buttons-bg.disabled x-on:click="show = !show" type="button">
            Cancel
        </x-lb::buttons-bg.disabled>
        {{ $button }}
    </div>
</x-lb::modal>

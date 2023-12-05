@props(['labelOff' => false])
<div class="h-full w-full bg-white" wire:ignore {{ $attributes->whereDoesntStartWith('wire:change') }}>
    <button class="relative -bottom-1 h-full w-full cursor-pointer select-none bg-white text-blue-600 underline"
        @click.prevent @dblclick="toggleEditingState" x-show="!isEditing">
        {{ $slot }}
    </button>
    <x-lb::form.input type="text" :label-off="$labelOff" {{ $attributes->whereStartsWith('wire:change') }}
        x-show="isEditing" @click.away="toggleEditingState" @keydown.enter="disableEditing"
        @keydown.window.escape="disableEditing" x-ref="input">
    </x-lb::form.input>
</div>

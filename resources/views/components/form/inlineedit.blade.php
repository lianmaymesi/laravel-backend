@props(['labelOff' => false, 'inputType' => 'input', 'options' => []])
<div class="h-full w-full" wire:ignore {{ $attributes->whereDoesntStartWith('wire:change') }}>
    <button class="relative h-full w-full cursor-pointer select-none text-blue-600 underline" @click.prevent
        @dblclick="toggleEditingState" x-show="!isEditing">
        {{ $slot }}
    </button>
    <div x-show="isEditing">
        @if ($inputType === 'input')
            <x-lb::form.input {{ $attributes->whereStartsWith('type') }} :label-off="$labelOff"
                {{ $attributes->whereStartsWith('wire:change') }} x-show="isEditing" @click.away="toggleEditingState"
                @keydown.enter="disableEditing" @keydown.window.escape="disableEditing" x-ref="input">
            </x-lb::form.input>
        @endif
        @if ($inputType === 'choice')
            <x-lb::form.choice :label-off="$labelOff" {{ $attributes->whereDoesntStartWith('wire:change') }}
                x-show="isEditing" :options="$options" @click.away="toggleEditingState"
                @keydown.window.escape="disableEditing" x-ref="input">
            </x-lb::form.choice>
        @endif
    </div>
</div>

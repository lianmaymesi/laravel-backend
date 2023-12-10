@props(['labelOff' => false, 'inputType' => 'input', 'options' => [], 'value', 'type'])
<div class="h-full w-full" wire:ignore {{ $attributes->whereDoesntStartWith('wire:change') }}
    {{ $attributes->whereDoesntStartWith('wire:model') }}>
    <button class="relative h-full w-full cursor-pointer select-none text-blue-600 underline" @click.prevent
        @dblclick="toggleEditingState" x-show="!isEditing">
        {{ $slot }}
    </button>
    <div x-show="isEditing">
        @if ($inputType === 'input')
            <x-lb::form.input :type="$type" :label-off="$labelOff" {{ $attributes->whereStartsWith('wire:change') }}
                {{ $attributes->whereStartsWith('wire:model') }} x-show="isEditing" @click.away="toggleEditingState"
                @keydown.enter="disableEditing" @keydown.window.escape="disableEditing" x-ref="input" :value="$value">
            </x-lb::form.input>
        @endif
        @if ($inputType === 'choice')
            <x-lb::form.choice :label-off="$labelOff" :options="$options" :value="$value" @click.away="toggleEditingState"
                @keydown.window.escape="disableEditing" x-ref="input" x-show="isEditing"
                {{ $attributes->whereDoesntStartWith('wire:change') }} {{ $attributes->whereStartsWith('wire:model') }}>
            </x-lb::form.choice>
        @endif
        @if ($inputType === 'textarea')
            <x-lb::form.textarea :label-off="$labelOff" @click.away="toggleEditingState"
                @keydown.window.escape="disableEditing" x-ref="input" x-show="isEditing"
                {{ $attributes->whereDoesntStartWith('wire:change') }} {{ $attributes->whereStartsWith('wire:model') }}>
                {{ $value }}
            </x-lb::form.textarea>
        @endif
    </div>
</div>

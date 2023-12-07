@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'options' => [],
])
<div class="grid gap-y-1.5" {{ $attributes->whereStartsWith('x-ref') }}>
    @if (!$labelOff)
        <div class="flex items-center justify-between">
            <label class="text-sm font-medium tracking-wide text-slate-950">
                {{ $label }}
                @if ($required)
                    <span class="text-red-600">*</span>
                @endif
            </label>
        </div>
    @endif
    <div x-data="{ ...choiceSelect(@entangle($attributes->wire('model')), {{ $options }}) }" class="w-full max-w-sm" wire:ignore {{ $attributes->whereDoesntStartWith('x-ref') }}>
        <div class="min-w-0 flex-1">
            <select x-ref="select" :multiple="multiple"></select>
        </div>
    </div>
    @if ($helpText)
        <div class="text-sm text-slate-500">
            {{ $helpText }}
        </div>
    @endif
    @if ($error)
        <div class="text-sm text-red-500">
            {{ $error }}
        </div>
    @endif
</div>

@pushOnce('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endPushOnce

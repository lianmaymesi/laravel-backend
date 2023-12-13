@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'options' => [],
    'value' => [],
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
    <div class="w-full max-w-full">
        <div class="min-w-0 flex-1">
            <select x-ref="selectdoc" :multiple="multiple" x-data="{ ...choiceSelect(@entangle($attributes->wire('model')), @js($options), @js($value)) }" wire:ignore x-cloak></select>
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
    {{ Vite::useHotFile('vendor/laravel-backend/laravel-backend.hot')->useBuildDirectory('vendor/laravel-backend')->withEntryPoints(['resources/css/choices.css']) }}
@endPushOnce

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
    <div x-data="{
        multiple: true,
        value: {{ $value }},
        options: {{ $options }},
        model: @entangle($attributes->wire('model')),
        init() {
            this.$nextTick(() => {
                let choices = new Choices(this.$refs.select, {
                    removeItemButton: true,
                    placeholderValue: 'All',
                    allowHTML: false
                })
                let refreshChoices = () => {
                    let selection = this.multiple ? this.value : [this.value]
                    choices.clearStore()
                    choices.setChoices(this.options.map(({ value, label }) => ({
                        value,
                        label,
                        selected: selection.includes(value),
                    })))
                }
                refreshChoices()
                this.$refs.select.addEventListener('change', () => {
                    this.value = choices.getValue(true)
                    this.model = choices.getValue(true)
                })
                this.$watch('value', () => refreshChoices())
                this.$watch('options', () => refreshChoices())
                this.$watch('model', () => refreshChoices())
            })
        }
    }" class="w-full max-w-sm" {{ $attributes->whereDoesntStartWith('x-ref') }}>
        <div class="min-w-0 flex-1" wire:ignore>
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
    {{ Vite::useHotFile('vendor/laravel-backend/laravel-backend.hot')->useBuildDirectory('vendor/laravel-backend')->withEntryPoints(['resources/css/choices.css', 'resources/js/choices.js']) }}
@endPushOnce

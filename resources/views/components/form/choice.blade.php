@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'options' => [],
    'value' => [],
])
<div class="grid gap-y-1.5" {{ $attributes->whereStartsWith('x-ref') }} wire:ignore-self>
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
    <div class="w-full max-w-full" {{ $attributes->whereDoesntStartWith('wire:model') }}>
        <div class="flex-1 min-w-0" x-data="{
            multiple: true,
            value: @js($value),
            options: @js($options),
            model: @entangle($attributes->wire('model')),
            init() {
                this.$nextTick(() => {
                    let choices = new Choices(this.$refs.selectdoc, {
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
                    this.$refs.selectdoc.addEventListener('change', () => {
                        this.value = choices.getValue(true)
                        this.model = choices.getValue(true)
                    })
                    this.$watch('value', () => refreshChoices())
                    this.$watch('options', () => refreshChoices())
                    this.$watch('model', () => refreshChoices())
                })
            }
        }" wire:ignore>
            <select x-ref="selectdoc" :multiple="multiple"></select>
        </div>
    </div>
    @if ($helpText)
        <div class="text-sm text-slate-500">
            {{ $helpText }}
        </div>
    @endif
    @if ($error)
        <x-lb::error>{{ $error }}</x-lb::error>
    @endif
</div>

@pushOnce('styles')
    {{ Vite::useHotFile('vendor/laravel-backend/laravel-backend.hot')->useBuildDirectory('vendor/laravel-backend')->withEntryPoints(['resources/css/choices.css']) }}
@endPushOnce

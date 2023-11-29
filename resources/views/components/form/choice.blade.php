@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'options' => [],
])
<div class="grid gap-y-1.5">
    @if (!$labelOff)
        <div class="flex items-center justify-between">
            <label for="" class="text-sm font-medium tracking-wide text-slate-950">
                {{ $label }}
                @if ($required)
                    <span class="text-red-600">*</span>
                @endif
            </label>
        </div>
    @endif
    <div x-data="{
        multiple: true,
        value: @entangle($attributes->wire('model')),
        options: {{ $options }},
        init() {
            this.$nextTick(() => {
                let choices = new Choices(this.$refs.select, {
                    removeItems: true,
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
                })
    
                this.$watch('value', () => refreshChoices())
                this.$watch('options', () => refreshChoices())
            })
        }
    }" class="w-full max-w-sm" wire:ignore>
        <select x-ref="select" :multiple="multiple"></select>
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
@pushOnce('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
@endPushOnce

@pushOnce('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endPushOnce

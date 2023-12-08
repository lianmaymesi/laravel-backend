@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'options' => [],
])
<div class="grid gap-y-1.5" {{ $attributes->whereStartsWith('x-ref') }} wire:ignore>
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
        value: @entangle($attributes->wire('model')),
        options: {{ $options }},
        init() {
            let bootSelect2 = () => {
                let selections = this.multiple ? this.value : [this.value]
                $(this.$refs.select).select2({
                    multiple: this.multiple,
                    data: this.options.map(function(i) {
                        if (i != null) {
                            return {
                                id: i.value,
                                text: i.label,
                                selected: selections.map(i => String(i)).includes(String(i.value)),
                            }
                        }
                    }),
                })
            }
            let refreshSelect2 = () => {
                $(this.$refs.select).select2('destroy')
                this.$refs.select.innerHTML = ''
                bootSelect2()
            }
            bootSelect2()
            $(this.$refs.select).on('change', () => {
                let currentSelection = $(this.$refs.select).select2('data')
                this.value = this.multiple ?
                    currentSelection.map(i => i.id) :
                    currentSelection[0].id
            })
            this.$watch('value', () => refreshSelect2())
            this.$watch('options', () => refreshSelect2())
        }
    }" wire:ignore class="w-full max-w-sm" {{ $attributes->whereDoesntStartWith('x-ref') }}>
        <select x-ref="select"></select>
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
@endPushOnce

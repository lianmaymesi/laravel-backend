@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'readonly' => false,
    'type' => 'single',
    'maxDate' => null,
    'minDate' => null,
])
<div class="grid gap-y-1.5">
    @if (!$labelOff)
        <div class="flex items-center justify-between">
            <label for="{{ str_slug($label) }}" class="text-sm font-medium tracking-wide text-slate-950"
                aria-invalid="{{ $error ? 'true' : 'false' }}">
                {{ $label }}
                @if ($required)
                    <span class="text-red-600">*</span>
                @endif
            </label>
        </div>
    @endif
    <div class="flex overflow-hidden rounded-lg bg-slate-50 ring-1 ring-slate-950/10 focus-within:ring-2 focus-within:ring-indigo-600"
        x-data="{
            value: @entangle($attributes->wire('model')),
            init() {
                let picker = flatpickr(this.$refs.picker, {
                    mode: '{{ $type }}',
                    dateFormat: 'Y/m/d',
                    defaultDate: this.value,
                    minDate: '{{ $minDate ?? 'null' }}',
                    maxDate: '{{ $maxDate ?? 'null' }}',
                    onChange: (date, dateString) => {
                        @if($type === 'single')
                        this.value = dateString
                        @else
                        this.value = dateString.split(' to ')
                        @endif
                    }
                })
                this.$watch('value', () => picker.setDate(this.value))
            },
        }" wire:ignore>
        <div class="flex-1 min-w-0">
            <input type="text" x-ref="picker"
                class="direction-ltr block w-full border-none bg-transparent py-1.5 pe-3 ps-3 text-sm leading-6 text-slate-950 outline-none transition duration-75 placeholder:text-slate-500 focus:ring-0 disabled:text-slate-500 disabled:placeholder:text-slate-400" />
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
    {{ Vite::useHotFile('vendor/laravel-backend/laravel-backend.hot')->useBuildDirectory('vendor/laravel-backend')->withEntryPoints(['resources/css/flatpickr.css']) }}
@endPushOnce

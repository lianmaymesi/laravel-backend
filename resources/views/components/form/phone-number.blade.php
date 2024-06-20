@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'readonly' => false,
])
<div class="grid gap-y-1.5">
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
    <div class="flex rounded-lg bg-slate-50 ring-1 ring-slate-950/10 focus-within:ring-2 focus-within:ring-indigo-600">
        <div class="flex-1 min-w-0 tekephone">
            <x-tel-input {{ $attributes }} aria-invalid="{{ $error ? 'true' : 'false' }}" id="{{ str_slug($label) }}"
                name="{{ str_slug($label) }}"
                class="block w-full border-none bg-transparent py-1.5 pe-3 ps-3 text-sm leading-6 text-slate-950 outline-none transition duration-75 placeholder:text-slate-500 focus:ring-0 disabled:text-slate-500 disabled:placeholder:text-slate-400">
            </x-tel-input>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@21.1.3/build/css/intlTelInput.css">
@endPushOnce

@pushOnce('scripts')
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@21.1.3/build/js/intlTelInput.min.js"></script>
@endPushOnce

@push('scripts')
    <script>
        const input = document.querySelector("#{{ str_slug($label) }}");
        window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@21.1.3/build/js/utils.js"
        });
        input.addEventListener('telchange', function(e) {
            console.log(e.detail.valid); // Boolean: Validation status of the number
            console.log(e.detail.validNumber);
            console.log(e.detail.number); // Returns the user entered number, maybe auto-formatted internationally
            console.log(e.detail.country); // Returns the phone country iso2
            console.log(e.detail.countryName); // Returns the phone country name
            console.log(e.detail.dialCode); // Returns the dial code
        });
    </script>
@endpush

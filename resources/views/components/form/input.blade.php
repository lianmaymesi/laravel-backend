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
    <div
        class="flex overflow-hidden rounded-lg bg-slate-50 ring-1 ring-slate-950/10 focus-within:ring-2 focus-within:ring-indigo-600">
        <div class="flex-1 min-w-0">
            <input {{ $attributes }} @if ($readonly) readonly @endif
                aria-invalid="{{ $error ? 'true' : 'false' }}" id="{{ str_slug($label) }}"
                class="block w-full border-none bg-transparent py-1.5 pe-3 ps-3 text-sm leading-6 text-slate-950 outline-hidden transition duration-75 placeholder:text-slate-500 focus:ring-0 disabled:text-slate-500 disabled:placeholder:text-slate-400" />
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

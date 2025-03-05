@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'height' => '500px',
    'value' => '',
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
    <div x-data="{ ...toastUiEditor(@entangle($attributes->wire('model')), '{{ $height }}', @js($value)) }" {{ $attributes->whereDoesntStartWith('wire:model') }}
        class="grid! w-full! overflow-hidden! rounded-lg border-none bg-slate-50 ring-1 ring-slate-950/10 focus-within:ring-2 focus-within:ring-indigo-600">
        <div x-ref="editor" class="prose! w-full! min-w-full!" wire:ignore></div>
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
    {{ Vite::useHotFile('vendor/laravel-backend/laravel-backend.hot')->useBuildDirectory('vendor/laravel-backend')->withEntryPoints(['resources/css/toastui.css']) }}
@endPushOnce

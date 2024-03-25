@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'height' => '500px',
])
@php
    $id = $label ? str_replace(' ', '', $label) : uniqid();
@endphp
<div class="grid gap-y-1.5 grid-cols-1 relative">
    @if (!$labelOff)
        <div class="flex items-center justify-between">
            <label for="" class="text-sm font-medium tracking-wide text-slate-950"
                aria-invalid="{{ $error ? 'true' : 'false' }}">
                {{ $label }}
                @if ($required)
                    <span class="text-red-600">*</span>
                @endif
            </label>
        </div>
    @endif
    <div x-data="{ description: @entangle($attributes->wire('model')) }" x-init="$watch('description', function(value) {
        $refs.trix.editor.loadHTML(value)
        var length = $refs.trix.editor.getDocument().toString().length
        $refs.trix.editor.setSelectedRange(length - 1)
    })" wire:ignore>
        <input name="{{ $id }}" id="{{ $id }}" type="hidden"
            {{ $attributes->whereStartsWith('wire:model') }} />
        <div x-on:trix-change.debounce.1000ms="description = $refs.trix.value">
            <trix-editor x-ref="trix" input="{{ $id }}"
                class="overflow-y-scroll porse !grid !w-full !overflow-hidden rounded-lg border-none bg-slate-50 ring-1 ring-slate-950/10 focus-within:ring-2 focus-within:ring-indigo-600"
                style="height: 20rem;">
            </trix-editor>
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
</div>

@pushOnce('styles')
    {{ Vite::useHotFile('vendor/laravel-backend/laravel-backend.hot')->useBuildDirectory('vendor/laravel-backend')->withEntryPoints(['resources/css/trix.css']) }}
    <style>[data-trix-button-group="file-tools"] { display: none !important; }</style>
@endPushOnce

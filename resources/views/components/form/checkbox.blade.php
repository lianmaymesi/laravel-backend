@props([
    'error' => '',
    'helpText' => '',
    'labelOff' => false,
    'label' => '',
])
<div @class(['grid', 'gap-y-1.5' => $helpText || $error])>
    <label @class([
        'inline-flex items-center' => !$labelOff,
        'leading-none flex' => $labelOff,
    ])>
        <input type="checkbox" {{ $attributes }} name="{{ $label . md5($label) }}" id="{{ $label . md5($label) }}"
            class="h-4 w-4 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring-0 focus:ring-indigo-200 focus:ring-opacity-50 focus:ring-offset-0" />
        @if (!$labelOff)
            <span class="ml-2 text-sm">{{ $slot }}</span>
        @endif
    </label>
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

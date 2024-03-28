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
        <input type="checkbox" {{ $attributes }} aria-invalid="{{ $error ? 'true' : 'false' }}"
            class="w-4 h-4 text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring-0 focus:ring-indigo-200 focus:ring-opacity-50 focus:ring-offset-0" />
        @if (!$labelOff)
            <span class="text-sm ltr:ml-2 rtl:mr-2">{{ $slot }}</span>
        @endif
    </label>
    @if ($helpText)
        <div class="text-sm text-slate-500">
            {{ $helpText }}
        </div>
    @endif
    @if ($error)
        <x-lb::error>{{ $error }}</x-lb::error>
    @endif
</div>

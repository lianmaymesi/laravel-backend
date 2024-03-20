@props([
    'error' => '',
    'helpText' => '',
    'labelOff' => false,
    'label' => '',
])
<div @class(['grid', 'gap-y-1.5' => $helpText || $error])>
    <label class="inline-flex items-center">
        <input type="radio" {{ $attributes }}
            class="text-indigo-600 border-gray-300 rounded-full shadow-sm focus:border-indigo-300 focus:ring-0 focus:ring-indigo-200 focus:ring-opacity-50 focus:ring-offset-0" />
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
        <x-lb::error>{{ $error }}</x-lb::error>
    @endif
</div>

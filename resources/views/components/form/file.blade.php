@props([
    'error' => '',
    'helpText' => '',
    'hasImage' => false,
    'label' => '',
])
<div class="grid gap-y-1.5">
    <div @class([
        'grid gap-y-4' => $attributes->has('multiple'),
        'flex items-center gap-x-4' =>
            !$attributes->has('multiple') && !$attributes->has('column'),
        'flex flex-col items-center gap-y-4' =>
            !$attributes->has('multiple') && $attributes->has('column'),
    ])>
        {{ $slot }}
        <input {{ $attributes }} type="file" aria-invalid="{{ $error ? 'true' : 'false' }}"
            class="block w-full text-sm text-slate-500 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100 ltr:file:mr-4 rtl:file:ml-4" />
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

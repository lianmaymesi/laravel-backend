@props(['error' => '', 'helpText' => '', 'temporary' => null, 'hasImage' => false])
<div class="grid gap-y-1.5">
    <div @class([
        'grid gap-y-4' => $attributes->has('multiple'),
        'flex items-center gap-x-4' => !$attributes->has('multiple'),
    ])>
        @if ($hasImage)
            @if ($attributes->has('multiple'))
                <div class="lm-scroll w-full overflow-hidden overflow-x-auto rounded-lg border border-slate-100 p-4">
                    <div class="flex space-x-2 overflow-hidden">
                        <div class="h-24">
                            <img src="https://picsum.photos/200/300" class="block h-full max-w-full rounded border"
                                alt="" />
                        </div>
                        <div class="h-24">
                            <img src="https://picsum.photos/200/340" class="block h-full max-w-full rounded border"
                                alt="" />
                        </div>
                        <div class="h-24">
                            <img src="https://picsum.photos/200" class="block h-full max-w-full rounded border"
                                alt="" />
                        </div>
                        <div class="h-24">
                            <img src="https://picsum.photos/300/200" class="block h-full max-w-full rounded border"
                                alt="" />
                        </div>
                    </div>
                </div>
            @else
                <div class="h-24">
                    @if ($temporary)
                        <img src="{{ $temporary->temporaryUrl() }}" class="block h-full max-w-full rounded border"
                            alt="" />
                    @else
                        <img src="https://placehold.co/600x300" class="block h-full max-w-full rounded border"
                            alt="" />
                    @endif
                </div>
            @endif
        @endif
        <input {{ $attributes }} type="file" name="{{ $label . md5($label) }}" id="{{ $label . md5($label) }}"
            class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100" />
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

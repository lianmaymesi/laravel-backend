@props(['color'])
<div class="grid gap-y-1">
    <div class="flex w-max">
        <div @class([
            'flex min-w-[theme(spacing.6)] items-center justify-center gap-x-1 rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset ',
            'bg-green-50 text-green-600 ring-green-600/10' => $color === 'green',
            'bg-red-50 text-red-600 ring-red-600/10' => $color === 'red',
            'bg-yellow-50 text-yellow-600 ring-yellow-600/10' => $color === 'yellow',
            'bg-indigo-50 text-indigo-600 ring-indigo-600/10' => $color === 'indigo',
        ])>
            <span class="grid">
                <span class="truncate pb-0.5">
                    {{ $slot }}
                </span>
            </span>
        </div>
    </div>
</div>

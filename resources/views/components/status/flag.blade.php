@props(['color'])
<div class="grid gap-y-1">
    <div class="flex w-max">
        <div @class([
            'flex min-w-[theme(spacing.6)] items-center justify-center gap-x-1 rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset ',
            'bg-green-50 text-green-600 ring-green-600/10' => $color === 'green',
            'bg-red-50 text-red-600 ring-red-600/10' => $color === 'red',
            'bg-yellow-50 text-yellow-600 ring-yellow-600/10' => $color === 'yellow',
            'bg-indigo-50 text-indigo-600 ring-indigo-600/10' => $color === 'indigo',
            'bg-orange-50 text-orange-600 ring-orange-600/10' => $color === 'orange',
            'bg-pink-50 text-pink-600 ring-pink-600/10' => $color === 'pink',
            'bg-fuchsia-50 text-fuchsia-600 ring-fuchsia-600/10' =>
                $color === 'fuchsia',
            'bg-purple-50 text-purple-600 ring-purple-600/10' => $color === 'purple',
            'bg-violet-50 text-violet-600 ring-violet-600/10' => $color === 'violet',
            'bg-blue-50 text-blue-600 ring-blue-600/10' => $color === 'blue',
            'bg-sky-50 text-sky-600 ring-sky-600/10' => $color === 'sky',
            'bg-cyan-50 text-cyan-600 ring-cyan-600/10' => $color === 'cyan',
            'bg-teal-50 text-teal-600 ring-teal-600/10' => $color === 'teal',
            'bg-rose-50 text-rose-600 ring-rose-600/10' => $color === 'rose',
            'bg-emerald-50 text-emerald-600 ring-emerald-600/10' =>
                $color === 'emerald',
            'bg-lime-50 text-lime-600 ring-lime-600/10' => $color === 'lime',
            'bg-amber-50 text-amber-600 ring-amber-600/10' => $color === 'amber',
            'bg-stone-50 text-stone-600 ring-stone-600/10' => $color === 'stone',
            'bg-neutral-50 text-neutral-600 ring-neutral-600/10' =>
                $color === 'neutral',
            'bg-gray-50 text-gray-600 ring-gray-600/10' => $color === 'gray',
            'bg-slate-50 text-slate-600 ring-slate-600/10' => $color === 'slate',
            'bg-zinc-50 text-zinc-600 ring-zinc-600/10' => $color === 'zinc',
        ])>
            <span class="grid">
                <span class="truncate pb-0.5">
                    {{ $slot }}
                </span>
            </span>
        </div>
    </div>
</div>

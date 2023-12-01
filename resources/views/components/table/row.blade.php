@props([
    'danger' => false,
    'highlight' => false,
])
<tr @class([
    'group border-b',
    'hover:bg-slate-200/30' => !$danger && !$highlight,
    'bg-red-200 hover:bg-red-100' => $danger,
    'bg-amber-400/20 hover:bg-amber-400/10' => $highlight,
]) {{ $attributes->except('class') }}>
    {{ $slot }}
</tr>

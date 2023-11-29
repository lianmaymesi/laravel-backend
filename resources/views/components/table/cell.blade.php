@props([
    'hideCell' => false,
])
<td @class([
    'px-3 py-3.5 text-sm first-of-type:ps-3 last-of-type:pe-3',
    'hidden' => $hideCell,
]) {{ $attributes }}>
    {{ $slot }}
</td>

@props([
    'hideCell' => false,
    'right' => false,
    'left' => false,
    'center' => false,
    'leftSticky' => false,
    'rightSticky' => false,
])
<td @class([
    'px-3 py-2 first-of-type:ps-3 last-of-type:pe-3 border-b',
    'hidden' => $hideCell,
    'text-right' => $right,
    'text-left' => $left,
    'text-center' => $center,
    'sticky first-of-type:left-0 z-[999] bg-slate-50' => $leftSticky,
    'sticky last-of-type:right-0 z-[999] bg-slate-50' => $rightSticky,
]) {{ $attributes }}>
    {{ $slot }}
</td>

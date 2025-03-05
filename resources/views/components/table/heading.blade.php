@props([
    'sortable' => false,
    'direction' => '',
    'hideColumn' => false,
    'leftSticky' => false,
    'rightSticky' => false,
    'customSticky' => false,
    'sticky' => false,
    'right' => false,
    'left' => true,
])
<th {{ $attributes }} @class([
    'bg-gray-100 px-3 py-2 sm:first-of-type:ps-3 sm:last-of-type:pe-3',
    'hidden' => $hideColumn,
    'sticky first-of-type:left-0 z-9999' => $leftSticky,
    'sticky last-of-type:right-0 z-9999' => $rightSticky,
    'sticky top-0' => $sticky,
    'text-right' => $right && !$left,
    'text-left' => $left && !$right,
]) @if ($customSticky) {{ $customSticky }} @endif>
    @if ($sortable)
        <button type="button" class="flex items-center cursor-pointer group gap-x-1 whitespace-nowrap">
            <span class="sr-only">
                Sort by
            </span>
            <span class="font-semibold text-gray-950">
                {{ $slot }}
            </span>
            @if ($direction === 'asc')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            @endif
            @if ($direction === 'desc')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            @endif
            <span class="sr-only">
                Ascending
            </span>
        </button>
    @else
        <span class="flex items-center group gap-x-1 whitespace-nowrap">
            <span class="font-semibold text-gray-950">
                {{ $slot }}
            </span>
        </span>
    @endif
</th>

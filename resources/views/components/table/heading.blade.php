@props(['sortable' => false, 'direction' => '', 'hideColumn' => false])
<th {{ $attributes }} @class([
    'sticky top-0 bg-gray-100 px-3 py-3.5 sm:first-of-type:ps-3 sm:last-of-type:pe-3',
    'hidden' => $hideColumn,
])>
    @if ($sortable)
        <button type="button" class="group flex cursor-pointer items-center gap-x-1 whitespace-nowrap">
            <span class="sr-only">
                Sort by
            </span>
            <span class="text-sm font-semibold text-gray-950">
                {{ $slot }}
            </span>
            @if ($direction === 'asc')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            @endif
            @if ($direction === 'desc')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            @endif
            <span class="sr-only">
                Ascending
            </span>
        </button>
    @else
        <span class="group flex items-center gap-x-1 whitespace-nowrap">
            <span class="text-sm font-semibold text-gray-950">
                {{ $slot }}
            </span>
        </span>
    @endif
</th>

@props(['title' => '', 'noBackground' => false, 'sticky' => false])
<div @class([
    'lg:rounded-lg w-full border',
    'bg-white' => !$noBackground,
    'sticky bottom-0' => $sticky,
])>
    @if ($title)
        <header class="sticky top-0 z-10 px-6 py-4 text-lg font-semibold bg-white border-b lg:rounded-t-lg">
            {{ $title }}
        </header>
    @endif
    <div @class(['relative z-0 grid grid-cols-1 gap-6 p-6 lg:grid-cols-2'])>
        {{ $slot }}
    </div>
</div>

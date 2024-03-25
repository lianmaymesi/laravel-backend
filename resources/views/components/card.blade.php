@props(['title' => '', 'noBackground' => false])
<div @class([
    'lg:rounded-lg w-full shadow border',
    'bg-white' => !$noBackground,
])>
    @if ($title)
        <header class="sticky top-0 z-10 px-6 py-4 text-lg font-semibold bg-white border-b lg:rounded-t-lg">
            {{ $title }}
        </header>
    @endif
    <div class="relative z-0 grid grid-cols-1 gap-6 p-6 lg:grid-cols-2">
        {{ $slot }}
    </div>
</div>

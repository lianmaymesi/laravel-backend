@props(['title' => '', 'noBackground' => false])
<div class="grid grid-cols-1">
    <section class="">
        <div @class(['lg:rounded-lg', 'bg-white' => !$noBackground])>
            @if ($title)
                <header class="border-b px-6 py-4 text-lg font-semibold">
                    {{ $title }}
                </header>
            @endif
            <div class="grid grid-cols-1 gap-6 p-6 lg:grid-cols-2">
                {{ $slot }}
            </div>
        </div>
    </section>
</div>

@props(['pageTitle'])
<div class="py-4">
    <ul class="flex space-x-2 text-sm font-medium text-slate-500">
        {{ $slot }}
    </ul>
    <h1 class="text-3xl font-semibold text-slate-900">
        {{ $pageTitle }}
    </h1>
</div>

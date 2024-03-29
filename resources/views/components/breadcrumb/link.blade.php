@props(['first' => false, 'link' => ''])
<li @class([
    'flex items-center space-x-2' => !$first,
    'text-slate-800' => $first,
])>
    @if (!$first)
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-3 h-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{ $link }}" class="duration-150 hover:text-slate-600">{{ $slot }}</a>
    @else
        <a href="{{ $link }}" class="duration-150 hover:text-slate-600">{{ $slot }}</a>
    @endif
</li>

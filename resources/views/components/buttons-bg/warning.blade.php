<button {{ $attributes }}
    class="rounded-lg bg-orange-600 px-3 py-2 text-sm font-medium leading-none text-orange-100 duration-150 hover:bg-orange-700 hover:text-orange-50">
    <div class="flex items-center">
        @if ($attributes->has('wire:target'))
            <svg wire:loading.delay.default class="mr-1 h-[15px] w-[15px] animate-spin" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" {{ $attributes->whereStartsWith('wire:target') }}>
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        @endif
        @if (isset($icon))
            {{ $icon }}
        @endif
        <span>
            {{ $slot }}
        </span>
    </div>
</button>

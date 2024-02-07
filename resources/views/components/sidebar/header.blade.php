<header class="flex w-full flex-shrink-0 items-center justify-center p-4">
    <div class="flex w-full items-center justify-between">
        <h1 class="text-xl font-bold">{{ $slot }}</h1>
        <button type="button"
                wire:click="close">
            <svg xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20"
                 fill="currentColor"
                 class="h-5 w-5">
                <path
                      d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
            </svg>
        </button>
    </div>
</header>

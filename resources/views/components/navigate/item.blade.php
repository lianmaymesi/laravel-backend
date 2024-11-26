@props([
    'route' => '',
    'is_active' => false,
    'noNavigate' => false,
    'path' => '',
    'hierarchy' => false,
    'title' => '',
])
@if (!$noNavigate)
    <li
        @if ($hierarchy) x-data="{ show: false }" x-init="show = $currentHierarchy({{ json_encode($path) }}) ?? false" @endif>
        @if (!$hierarchy)
            <a href="{{ $route }}" wire:navigate
                x-bind:class="$current('{{ $path }}') ? 'bg-indigo-700 text-indigo-50' : 'text-slate-700'"
                class="flex items-center p-2 text-sm font-medium leading-none rounded-lg hover:bg-indigo-700 hover:text-indigo-50">
                <div class="flex items-center gap-x-3">
                    @if (isset($icon))
                        {{ $icon }}
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    @endif
                    <span>{{ $slot }}</span>
                </div>
            </a>
        @else
            <button @click="show = !show"
                class="flex items-center w-full p-2 text-sm font-medium leading-none rounded-lg hover:bg-indigo-700 hover:text-indigo-50">
                <div class="flex justify-between w-full">
                    <div class="flex items-center">
                        @if (isset($icon))
                            {{ $icon }}
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        @endif
                        <span>{{ $title }}</span>
                    </div>
                    <div>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </button>
            <ul class="grid mt-2 ml-4 gap-y-2" x-show="show">
                {{ $slot }}
            </ul>
        @endif
    </li>
@else
    <li
        @if ($hierarchy) x-data="{ show: false }" x-init="show = {{ json_encode(request()->is($path)) }}" @endif>
        @if (!$hierarchy)
            <a href="{{ $route }}" @class([
                'flex items-center p-2 text-sm font-medium leading-none rounded-lg hover:bg-indigo-700 hover:text-indigo-50',
                'bg-indigo-700 text-indigo-50' => $is_active,
                'text-slate-700' => !$is_active,
            ])>
                <div class="flex items-center gap-x-3">
                    @if (isset($icon))
                        {{ $icon }}
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    @endif
                    <span>{{ $slot }}</span>
                </div>
            </a>
        @else
            <button @click="show = !show" @class([
                'flex items-center w-full p-2 text-sm font-medium leading-none rounded-lg hover:bg-indigo-700 hover:text-indigo-50',
            ])>
                <div class="flex justify-between w-full">
                    <div class="flex items-center">
                        @if (isset($icon))
                            {{ $icon }}
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        @endif
                        <span>{{ $title }}</span>
                    </div>
                    <div>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </button>
            <ul class="grid mt-2 ml-4 gap-y-2" x-show="show">
                {{ $slot }}
            </ul>
        @endif
    </li>
@endif

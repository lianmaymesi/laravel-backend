@props([
    'settingsUrl' => '',
    'imageUrl' => '',
    'name' => '',
    'logoutUrl' => '',
    'initials' => '',
    'hasAvatar' => false,
    'logoUrl' => '',
])
@php
    $maxWidth = [
        'xs' => 'max-w-xs',
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        '5xl' => 'max-w-5xl',
        '6xl' => 'max-w-6xl',
        '7xl' => 'max-w-7xl',
        'full' => 'max-w-full',
        'min' => 'max-w-min',
        'max' => 'max-w-max',
        'fit' => 'max-w-fit',
        'scrren-sm' => 'max-w-scrren-sm',
        'screen-md' => 'max-w-screen-md',
        'screen-lg' => 'max-w-screen-lg',
        'screen-xl' => 'max-w-screen-xl',
        'screen-2xl' => 'max-w-screen-2xl',
    ][$maxWidth ?? '2xl'];
@endphp
<div class="relative min-h-full">
    <div>
        <div class="relative">
            <div class="relative mb-0 w-full">
                <header class="relative w-full min-w-[min-content] border-b border-slate-100 bg-white py-2">
                    <div @class(['mx-auto flex items-center justify-between px-4', $maxWidth])>
                        <button x-show="!isOpen()" @click.prevent="handleOpen()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                        <button x-show="isOpen()" @click.prevent="handleClose()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                        </button>
                        <a href="/" wire:navigate
                            class="ml-3 flex min-w-[238px] shrink-0 grow basis-auto items-center space-x-4">
                            <img src="{{ $logoUrl }}" alt="" class="mb-1 h-6" />
                        </a>
                        <div class="hidden shrink grow basis-full justify-start align-middle lg:flex">
                            <div class="relative flex w-full max-w-lg items-center">
                                <div class="absolute pl-4 text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </div>
                                <input type="text" name="" id=""
                                    class="w-full rounded-full border-0 bg-slate-100 py-2 pl-14 pr-4 font-medium ring-0 focus:ring-0" />
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="rounded-full p-1.5 text-slate-700 duration-150 hover:bg-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </header>
            </div>
            <div @class(['relative mx-auto flex flex-col', $maxWidth])>
                <div class="flex flex-col justify-between px-4 md:flex-row md:items-end">
                    @if (isset($heading))
                        {{ $heading }}
                    @endif
                </div>
                <div class="relative gap-6 px-0 lg:px-4"
                    :class="{
                        'flex flex-row': isAboveBreakPoint
                    }">
                    <div class="overflow-hidden"
                        :class="{
                            'lg:min-w-[256px]': isAboveBreakPoint,
                            'fixed max-w-[300px] z-10 w-full left-0 top-[53px]': !isAboveBreakPoint
                        }"
                        x-show="isOpen()" x-transition:enter="transition ease-in-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-x-1/2"
                        x-transition:enter-end="opacity-100 transform translate-x-0"
                        x-transition:leave="transition ease-in-out duration-200"
                        x-transition:leave-start="opacity-100 transform translate-x-0"
                        x-transition:leave-end="opacity-0 transform -translate-x-1/2" style="display: none;">
                        <div class="relative box-border flex h-[calc(100vh-229px)] w-full flex-col overflow-hidden overflow-y-auto"
                            :class="{
                                'max-w-[256px]': isAboveBreakPoint,
                                'max-w-[240px] bg-white p-2': !isAboveBreakPoint
                            }"
                            @click.outside="handleAway()">
                            <x-lb::navigate>
                                @if (isset($navigation))
                                    {{ $navigation }}
                                @endif
                            </x-lb::navigate>
                        </div>
                        <div
                            class="relative bottom-0 flex w-full items-center justify-between rounded-lg border border-slate-200 bg-slate-200/30 p-2">
                            <div class="flex items-center">
                                @if ($hasAvatar)
                                    <button
                                        class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-700 bg-blue-200 p-1 text-lg font-medium text-blue-800">
                                        {{ $initials }}
                                    </button>
                                @else
                                    <img src="{{ $imageUrl }}" alt=""
                                        class="h-12 w-12 overflow-hidden rounded-full" />
                                @endif
                                <div class="ml-4">
                                    <div class="text-lg font-semibold leading-none">{{ $name }}</div>
                                    <a href="{{ $logoutUrl }}" class="text-sm">Logout</a>
                                </div>
                            </div>
                            <a href="{{ $settingsUrl }}" class="rounded-full p-1 duration-200 hover:bg-slate-300/50">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="lm-scroll-hidden mt-4 h-[calc(100vh-209px)] grow overflow-hidden overflow-y-auto md:h-[calc(100vh-177px)]"
                        :class="{
                            'w-full lg:w-[calc(100vh-256px)]': isAboveBreakPoint,
                            'relative w-full z-0': !isAboveBreakPoint
                        }">
                        {{ $slot }}
                    </div>
                </div>
                <div class="absolute inset-0 -mb-4 bg-slate-600/25" x-show="!isAboveBreakPoint & isOpen()"
                    style="display: none;">
                </div>
            </div>
        </div>
    </div>
</div>

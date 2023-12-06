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
                        <div class="flex min-w-[238px] shrink-0 grow basis-auto items-center space-x-4">
                            <img src="{{ asset('assets/catzket.png') }}" alt="" class="mb-1 h-6" />
                        </div>
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
                            <button
                                class="flex h-8 w-8 items-center justify-center rounded-full border border-blue-700 bg-blue-200 p-1.5 text-lg font-medium text-blue-800">
                                LD
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
                        <div class="box-border flex h-[calc(100vh-57px)] w-full flex-col overflow-hidden overflow-y-auto"
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

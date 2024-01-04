@props(['dataCount' => 1, 'columns', 'pagination' => false, 'underTab' => false, 'hideTableProps' => false])
<div class="relative overflow-hidden rounded-b-xl rounded-t-3xl border-y bg-slate-50 lg:rounded-t-lg">
    @if (!$hideTableProps)
        <div class="sticky top-0 z-[99999] -mb-[2px] border-x border-b bg-gray-50 px-4 py-3">
            <div class="flex items-center justify-between">
                <div></div>
                <div class="flex items-center gap-x-3">
                    @if (isset($tableControls))
                        {{ $tableControls }}
                    @endif
                    <x-lb::form.input wire:model.live="search" label-off placeholder="Search" label="Search">
                    </x-lb::form.input>
                    <x-lb::form.select wire:model.live="perPage" label-off>
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="500">500</option>
                        <option value="1000">1000</option>
                    </x-lb::form.select>
                    <div class="relative flex items-center" x-data="{ showFilters: false }">
                        <button x-on:click="showFilters = !showFilters" x-ref="filter">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                            </svg>
                        </button>
                        <div class="w-screen max-w-[260px] rounded-xl border bg-gray-100" x-show="showFilters"
                            x-anchor.bottom-start.offset.16="$refs.filter" style="display: none;">
                            <div class="px-4 pb-6 pt-4" @click.away="showFilters = false">
                                <div class="flex items-center justify-between">
                                    <div class="font-semibold">Filters</div>
                                    <x-lb::buttons.danger wire:click="resetFilter">Reset</x-lb::buttons.danger>
                                </div>
                                <div class="mt-4 grid gap-y-4">
                                    @if (isset($filters))
                                        {{ $filters }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex items-center" x-data="{ showColumns: false }">
                        <button x-on:click="showColumns = !showColumns" x-ref="columns">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                        </button>
                        <div class="absolute w-screen max-w-[260px] rounded-xl border bg-gray-100" x-show="showColumns"
                            x-anchor.bottom-start.offset.16="$refs.columns" style="display: none;">
                            <div class="px-4 pb-6 pt-4" @click.away="showColumns = false">
                                <div class="flex items-center justify-between">
                                    <div class="font-semibold">Columns</div>
                                    <x-lb::buttons.danger wire:click="resetColumns">Reset</x-lb::buttons.danger>
                                </div>
                                <div class="mt-4 grid gap-y-4">
                                    @foreach ($columns as $key => $column)
                                        <div>
                                            <x-lb::form.checkbox wire:model.live="selectedColumns" :value="$column">
                                                {{ ucfirst($column) }}
                                            </x-lb::form.checkbox>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div @class([
        'lm-scroll overflow-y-auto overflow-x-auto border-x z-0',
        'h-[calc(100vh-335px)] md:h-[calc(100vh-303px)]' =>
            $dataCount > 1 && !$underTab,
        'h-[calc(100vh-367px)] md:h-[calc(100vh-365px)]' =>
            $dataCount > 1 && $underTab,
        'h-[calc(100vh-274px)] md:h-[calc(100vh-239px)]' =>
            $dataCount == 1 && !$underTab,
        'h-[calc(100vh-311px)] md:h-[calc(100vh-281px)]' =>
            $dataCount == 1 && $underTab,
    ]) {{ $attributes }}>
        {{ $slot }}
    </div>
    @if ($dataCount > 1)
        <div class="sticky bottom-0 border-x border-t bg-gray-50 px-4 py-3">
            {!! $pagination !!}
        </div>
    @endif
</div>

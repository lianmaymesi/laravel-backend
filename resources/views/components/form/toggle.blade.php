<div class="grid gap-y-2">
    <div class="flex items-center justify-between gap-x-3">
        <label for="" class="inline-flex items-center gap-x-3">
            {{-- @entangle($attributes->wire('model')) --}}
            <button x-data="{
                switch_state: @entangle($attributes->wire('model'))
            }" @click.prevent="switch_state = !switch_state"
                class="inline-flex h-6 w-11 items-center rounded-full border-2 outline-hidden"
                :class="{
                    'bg-slate-200 border-slate-200': !
                        switch_state,
                    'bg-indigo-600 border-indigo-600': switch_state
                }">
                <span
                    class="relative inline-block h-5 w-5 translate-x-0 transform rounded-full bg-white shadow-sm ring-0 transition duration-200 ease-in-out"
                    :class="{ 'translate-x-0': !switch_state, 'translate-x-5': switch_state }">
                    <span class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                        :class="{
                            'opacity-0 ease-out duration-100': switch_state,
                            'opacity-100 ease-in duration-200': !switch_state
                        }"></span>
                    <span
                        class="absolute inset-0 flex h-full w-full items-center justify-center opacity-0 transition-opacity duration-200 ease-out"></span>
                </span>
            </button>
            <span class="text-sm text-slate-950 dark:text-slate-300">Visible</span>
        </label>
    </div>
    <div class="text-sm text-slate-500">
        This product will be hidden from all sales channels.
    </div>
</div>

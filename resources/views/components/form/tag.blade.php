@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
])
<div x-data="{
    open: false,
    textInput: '',
    tags: @entangle($attributes->wire('model')).live,
    removeTag(index) {
        this.tags.splice(index, 1)
        this.fireTagsUpdateEvent()
    },
    fireTagsUpdateEvent() {
        this.$el.dispatchEvent(new CustomEvent('tags-update', {
            detail: { tags: this.tags },
            bubbles: true,
        }));
    },
    clearSearch() {
        this.textInput = ''
        this.toggleSearch()
    },
    toggleSearch() {
        this.open = this.textInput != ''
    },
    search(q) {
        if (q.includes(' ,')) { q.split(' ,').forEach(function(val) { this.addTag(val) }, this) } this.toggleSearch()
    },
    addTag(tag) {
        tag = tag.trim()
        if (tag != '' && !this.hasTag(tag)) {
            this.tags.push(tag)
        }
        this.clearSearch()
        this.$refs.textInput.focus()
        this.fireTagsUpdateEvent()
    },
    hasTag(tag) {
        var tag = this.tags.find(e => {
            return e.toLowerCase() === tag.toLowerCase()
        })
        return tag != undefined
    },
}" class="relative grid w-full gap-y-1.5">
    <div>
        @if (!$labelOff)
            <div class="flex items-center justify-between">
                <label class="text-sm font-medium tracking-wide text-slate-950">
                    {{ $label }}
                    @if ($required)
                        <span class="text-red-600">*</span>
                    @endif
                </label>
            </div>
        @endif
        <div @click.away="clearSearch()" class="w-full" @keydown.escape="clearSearch()">
            <div class="relative" @keydown.enter.prevent="addTag(textInput)">
                <div
                    class="flex overflow-hidden rounded-lg bg-slate-50 ring-1 ring-slate-950/10 focus-within:ring-2 focus-within:ring-indigo-600">
                    <input type="text" x-model="textInput" x-ref="textInput" @input="search($event.target.value)"
                        class="block w-full border-none bg-transparent py-1.5 pe-3 ps-3 text-sm leading-6 text-slate-950 outline-none transition duration-75 placeholder:text-slate-500 focus:ring-0 disabled:text-slate-500 disabled:placeholder:text-slate-400"
                        placeholder="{{ $label }}" />
                </div>
            </div>
            <div :class="[open ? 'block' : 'hidden']">
                <div class="absolute left-0 z-[9999] mt-2 w-full">
                    <div
                        class="py-1 text-sm bg-white border border-gray-300 rounded shadow-lg dark:border-slate-700 dark:bg-slate-900">
                        <a @click.prevent="addTag(textInput)"
                            class="block px-5 py-1 cursor-pointer hover:bg-indigo-600 hover:text-white">
                            Add tag "<span class="font-semibold" x-text="textInput"></span>"
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <select class="hidden" multiple {{ $attributes }}>
            <template x-for="(tag, index) in tags">
                <option :value="tag" x-text="tag" selected :key="index"></option>
            </template>
        </select>
    </div>
    <div class="mt-0.5 flex flex-wrap gap-2 overflow-hidden">
        <template x-for="(tag, index) in tags">
            <div class="inline-flex items-center gap-1 text-xs font-medium text-white bg-indigo-600 rounded">
                <span class="max-w-xs truncate py-0.5 pl-2 pr-1 leading-relaxed dark:text-white" x-text="tag"></span>
                <button @click.prevent="removeTag(index)"
                    class="inline-block w-6 h-6 text-indigo-100 align-middle hover:text-white focus:outline-none">
                    <svg class="w-6 h-6 mx-auto fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
                    </svg>
                </button>
            </div>
        </template>
    </div>
    @if ($helpText)
        <div class="text-sm text-slate-500">
            {{ $helpText }}
        </div>
    @endif
    @if ($error)
        <x-lb::error>{{ $error }}</x-lb::error>
    @endif
</div>

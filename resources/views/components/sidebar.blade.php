@php
    $id = $id ?? md5($attributes->wire('model'));
    $maxWidth = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        '5xl' => 'max-w-5xl',
    ][$maxWidth ?? 'md'];
@endphp
<div x-data="{
    show: @entangle($attributes->wire('model')),
    focusables() {
        // All focusable element types...
        let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
        return [...$el.querySelectorAll(selector)]
            // All non-disabled elements...
            .filter(el => !el.hasAttribute('disabled'))
    },
    firstFocusable() { return this.focusables()[0] },
    lastFocusable() { return this.focusables().slice(-1)[0] },
    nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
    prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
    nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
    prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },
}" x-init="$watch('show', value => {
    if (value) {
        document.body.classList.add('overflow-y-hidden');
        {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
    } else {
        document.body.classList.remove('overflow-y-hidden');
    }
})" x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" id="{{ $id }}"
    @class([
        'fixed inset-y-0 right-0 z-99999 flex h-screen max-h-screen min-h-screen w-full shrink-0 grow basis-auto flex-col border-l border-slate-200 bg-white shadow-sm',
        $maxWidth,
    ]) x-transition:enter="transition ease-in-out duration-200"
    x-transition:enter-start="opacity-0 transform translate-x-1/2"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition ease-in-out duration-200"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-1/2" style="display: none;">
    <div
        class="absolute inset-y-0 right-0 z-9999 border-l shadow-md flex h-full w-full transform flex-col overflow-hidden transition-all duration-[400ms]">
        {{ $slot }}
    </div>
    <div class="fixed inset-0 z-0 bg-slate-100/80 lm-scroll-hidden"></div>
</div>

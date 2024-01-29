@props(['haveContent'])
<div x-data="{
    input: '{{ $slot }}',
    show: false,
    toggle() {
        $clipboard(this.input);
        this.show = true;
        setTimeout(() => this.show = false, 1000);
    }
}">
    @if ($haveContent)
        <div class="text-wrap relative flex max-w-[180px] cursor-pointer items-center justify-between rounded-lg border border-slate-200 bg-slate-50 px-2 py-1 text-sm"
            @click="toggle">
            <div class="max-w-[156px] overflow-hidden">
                {{ $slot }}
            </div>
            <div class="absolute inset-0 flex items-center justify-center rounded-lg bg-slate-300/80 p-1 px-2 font-bold duration-150"
                x-show="show" style="display: none;">
                Copied!
            </div>
        </div>
    @endif
</div>

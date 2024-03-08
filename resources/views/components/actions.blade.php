<div class="relative" x-data="{ show: false }">
    <button @click="show = !show" class="block p-1.5 rounded-full lg:hidden"
        :class="{
            'bg-indigo-600 text-white hover:text-indigo-600 hover:bg-slate-200 duration-150': !
                show,
            'bg-red-600 text-white hover:text-red-600 hover:bg-slate-200 duration-150': show
        }">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" x-show="!show">
            <path fill-rule="evenodd"
                d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Zm0 5.25a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                clip-rule="evenodd" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" x-show="show"
            style="display: none">
            <path
                d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
        </svg>
    </button>
    <div class=""
        :class="{
            'absolute shadow-md z-50 text-left right-0 top-12 py-4 px-2 flex flex-col items-start w-full !min-w-[240px] bg-white border rounded-lg gap-y-2': show &
                window.innerWidth < 1024,
            'flex items-center gap-x-2': window.innerWidth > 1024
        }"
        x-show="show || window.innerWidth > 1024" @click.outside="show = false" style="display: none;">
        {{ $slot }}
    </div>
</div>

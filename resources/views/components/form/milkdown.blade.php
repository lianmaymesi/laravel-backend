@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
])
<div class="grid gap-y-1.5">
    @if (!$labelOff)
        <div class="flex items-center justify-between">
            <label for="" class="text-sm font-medium tracking-wide text-slate-950 dark:text-slate-300">
                {{ $label }}
                @if ($required)
                    <span class="text-red-600">*</span>
                @endif
            </label>
        </div>
    @endif
    <div x-data="{
        markdown: @entangle($attributes->wire('model')),
        init() {
            this.$nextTick(() => {
                let editor = new toastui.Editor({
                    el: this.$refs.editor,
                    height: '500px',
                    initialEditType: 'markdown',
                    previewStyle: 'tab',
                    initialValue: this.markdown,
                    previewHighlight: false,
                    viewer: false
                });
                editor.getMarkdown();
            });
        }
    }"
        class="flex !overflow-hidden rounded-lg border-none bg-slate-50 ring-1 ring-slate-950/10 focus-within:ring-2 focus-within:ring-indigo-600 dark:bg-slate-950/10 dark:ring-slate-400/30 dark:focus-within:ring-indigo-500">
        <div x-ref="editor" class="prose"></div>
    </div>
    @if ($helpText)
        <div class="text-sm text-slate-500">
            {{ $helpText }}
        </div>
    @endif
    @if ($error)
        <div class="text-sm text-red-500">
            {{ $error }}
        </div>
    @endif
</div>

@pushOnce('scripts')
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
@endPushOnce

@pushOnce('styles')
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
@endPushOnce

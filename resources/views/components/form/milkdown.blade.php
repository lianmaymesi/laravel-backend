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
            <label for="" class="text-sm font-medium tracking-wide text-slate-950">
                {{ $label }}
                @if ($required)
                    <span class="text-red-600">*</span>
                @endif
            </label>
        </div>
    @endif
    <div x-data="{
        markdown: @entangle({{ $attributes->wire('model') }}),
        init() {
            let editor = new Editor({
                el: this.$refs.editor,
                height: '500px',
                initialEditType: 'markdown',
                initialValue: this.markdown,
                previewHighlight: true,
                viewer: false,
                usageStatistics: false,
                previewStyle: 'vertical',
            });
            editor.getMarkdown();
        }
    }"
        class="!grid !w-full !overflow-hidden rounded-lg border-none bg-slate-50 ring-1 ring-slate-950/10 focus-within:ring-2 focus-within:ring-indigo-600">
        <div x-ref="editor" class="!prose !w-full !min-w-full"></div>
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

@pushOnce('styles')
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
@endPushOnce

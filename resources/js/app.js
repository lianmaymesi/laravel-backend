import { Livewire, Alpine } from "../../vendor/livewire/livewire/dist/livewire.esm";
import Collapse from "@alpinejs/collapse";
import Anchor from "@alpinejs/anchor";
import Editor from "@toast-ui/editor";
import Choices from "choices.js";

const breakpoint = 1024;
document.addEventListener('alpine:init', function () {
    Alpine.data('sidebar', (persist = false) => ({
        open: {
            above: true,
            below: false
        },
        isAboveBreakPoint: window.innerWidth > breakpoint,
        isSidebarPersist: persist,
        handleResize() {
            this.isAboveBreakPoint = window.innerWidth > breakpoint;
        },
        isOpen() {
            if(this.isAboveBreakPoint & !this.isSidebarPersist) {
                return this.open.above;
            }
            return this.open.below;
        },
        handleOpen() {
            if(this.isAboveBreakPoint) {
                this.open.above = true;
            }
            this.open.below = true;
        },
        handleClose() {
            if(this.isSidebarPersist) {
                this.open.above = false;
            } else {
                this.open.above = false;
            }
            this.open.below = false;
        },
        handleAway() {
            if(this.isSidebarPersist)  {
                this.open.below = false;
            } else {
                if(!this.isAboveBreakPoint) {
                    this.open.below = false;
                }
            }
        }
    }));

    Alpine.data('inlineedit', () => ({
        isEditing: false,
        toggleEditingState() {
            this.isEditing = !this.isEditing;

            if (this.isEditing) {
                this.$nextTick(() => {
                    this.$refs.input.focus();
                });
            }
        },
        disableEditing() {
            this.isEditing = false;
        }
    }));

    Alpine.data('toastUiEditor', (model, height = '500px', value) => ({
        markdown: model,
        value: value,
        init() {
            let editor = new Editor({
                el: this.$refs.editor,
                height: height,
                initialEditType: 'markdown',
                initialValue: this.markdown,
                previewHighlight: true,
                viewer: false,
                usageStatistics: false,
                previewStyle: 'vertical',
            });
            editor.on('change', () => {
                this.markdown = editor.getMarkdown();
                this.value = editor.getMarkdown();
            });
        }
    }));

    Alpine.data('choiceSelect', (model, options, value) => ({
        multiple: true,
        value: value,
        options: options,
        model: model,
        init() {
            this.$nextTick(() => {
                let choices = new Choices(this.$refs.select, {
                    removeItemButton: true,
                    placeholderValue: 'All'
                })
                let refreshChoices = () => {
                    let selection = this.multiple ? this.value : [this.value]
                    choices.clearStore()
                    choices.setChoices(this.options.map(({ value, label }) => ({
                        value,
                        label,
                        selected: selection.includes(value),
                    })))
                }
                refreshChoices()
                this.$refs.select.addEventListener('change', () => {
                    this.value = choices.getValue(true)
                    this.model = choices.getValue(true)
                })
                this.$watch('value', () => refreshChoices())
                this.$watch('options', () => refreshChoices())
                this.$watch('model', () => refreshChoices())
            })
        }
    }));

    Alpine.data('selectjs', (value, options) => ({
        multiple: true,
        value: value,
        options: options,
        init() {
            let bootSelect2 = () => {
                let selections = this.multiple ? this.value : [this.value]
                $(this.$refs.select).select2({
                    multiple: this.multiple,
                    data: this.options.map(function(i) {
                        if (i != null) {
                            return {
                                id: i.value,
                                text: i.label,
                                selected: selections.map(i => String(i)).includes(String(i.value)),
                            }
                        }
                    }),
                })
            }
            let refreshSelect2 = () => {
                $(this.$refs.select).select2('destroy')
                this.$refs.select.innerHTML = ''
                bootSelect2()
            }
            bootSelect2()
            $(this.$refs.select).on('change', () => {
                let currentSelection = $(this.$refs.select).select2('data')
                this.value = this.multiple ?
                    currentSelection.map(i => i.id) :
                    currentSelection[0].id
            })
            this.$watch('value', () => refreshSelect2())
            this.$watch('options', () => refreshSelect2())
        }
    }));
});

Alpine.plugin(Collapse);
Alpine.plugin(Anchor);

Livewire.start();

import Alpine from "alpinejs";
import Collapse from "@alpinejs/collapse";
import Anchor from "@alpinejs/anchor";
import sort from "@alpinejs/sort";
import Editor from "@toast-ui/editor";
import Choices from "choices.js";
import Clipboard from "@ryangjchandler/alpine-clipboard";
import Trix from "trix";
import flatpickr from "flatpickr";
import "livewire-sortable";

const breakpoint = 1024;

document.addEventListener("alpine:init", function () {
    Alpine.data("sidebar", (persist = false) => ({
        open: {
            above: true,
            below: false,
        },
        isAboveBreakPoint: window.innerWidth > breakpoint,
        isSidebarPersist: persist,
        handleResize() {
            this.isAboveBreakPoint = window.innerWidth > breakpoint;
        },
        isOpen() {
            if (this.isAboveBreakPoint & !this.isSidebarPersist) {
                return this.open.above;
            }
            return this.open.below;
        },
        handleOpen() {
            if (this.isAboveBreakPoint) {
                this.open.above = true;
            }
            this.open.below = true;
        },
        handleClose() {
            if (this.isSidebarPersist) {
                this.open.above = false;
            } else {
                this.open.above = false;
            }
            this.open.below = false;
        },
        handleAway() {
            if (this.isSidebarPersist) {
                this.open.below = false;
            } else {
                if (!this.isAboveBreakPoint) {
                    this.open.below = false;
                }
            }
        },
    }));

    Alpine.data("inlineedit", () => ({
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
        },
    }));
});

Alpine.plugin(sort);
Alpine.plugin(Collapse);
Alpine.plugin(Anchor);
Alpine.plugin(Clipboard);
Alpine.start();

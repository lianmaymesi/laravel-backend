import { Livewire, Alpine } from "../../../vendor/livewire/livewire/dist/livewire.esm";
import Collapse from "@alpinejs/collapse";
import Anchor from "@alpinejs/anchor";

const breakpoint = 1024;

document.addEventListener("alpine:init", () => {
    Alpine.data('sidebar', () => ({
        open: {
            above: true,
            below: false
        },
        isAboveBreakPoint: window.innerWidth > breakpoint,
        handleResize() {
            this.isAboveBreakPoint = window.innerWidth > breakpoint;
        },
        isOpen() {
            if(this.isAboveBreakPoint) {
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
            if (this.isAboveBreakpoint) {
                this.open.above = false;
            }
            this.open.below = false;
        },
        handleAway() {
            if(!this.isAboveBreakPoint) {
                this.open.below = false;
            }
        }
    }));
})

Alpine.plugin(Collapse);
Alpine.plugin(Anchor);

Livewire.start();

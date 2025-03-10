@props([
    'label' => '',
    'labelOff' => false,
    'error' => '',
    'required' => false,
    'helpText' => '',
    'readonly' => false,
])
<div class="grid gap-y-1.5">
    @if (!$labelOff)
        <div class="flex items-center justify-between">
            <label for="{{ str_slug($label) }}" class="text-sm font-medium tracking-wide text-slate-950">
                {{ $label }}
                @if ($required)
                    <span class="text-red-600">*</span>
                @endif
            </label>
        </div>
    @endif
    <div class="flex overflow-hidden rounded-lg bg-slate-50 ring-1 ring-slate-950/10 focus-within:ring-2 focus-within:ring-indigo-600"
        x-data="{
            value: @entangle($attributes->wire('model')),
            init() {
                $(this.$refs.picker).daterangepicker({
                    startDate: this.value[0],
                    endDate: this.value[1],
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                }, (start, end) => {
                    this.value[0] = start.format('MM/DD/YYYY')
                    this.value[1] = end.format('MM/DD/YYYY')
                })
                this.$watch('value', () => {
                    $(this.$refs.picker).data('daterangepicker').setStartDate(this.value[0])
                    $(this.$refs.picker).data('daterangepicker').setEndDate(this.value[1])
                });
            }
        }" wire:ignore>
        <div class="flex-1 min-w-0">
            <input type="text" x-ref="picker"
                class="block w-full border-none bg-transparent py-1.5 pe-3 ps-3 text-sm leading-6 text-slate-950 outline-hidden transition duration-75 placeholder:text-slate-500 focus:ring-0 disabled:text-slate-500 disabled:placeholder:text-slate-400" />
        </div>
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

@pushOnce('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@endPushOnce

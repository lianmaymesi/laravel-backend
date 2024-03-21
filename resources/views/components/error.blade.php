<div class="text-sm text-red-500" aria-live="assertive" x-init="$el.closest('form').querySelector('[aria-invalid=true]').closest('div').scrollIntoView()">
    {{ $slot }}
</div>

@props([
    'haveImage' => false,
    'rtl' => false,
])
<form {{ $attributes }} novalidate @if ($haveImage) enctype="multipart/form-data" @endif
    dir="{{ $rtl ? 'rtl' : 'ltr' }}">
    @csrf
    {{ $slot }}
</form>

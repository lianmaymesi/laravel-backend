@props([
    'haveImage' => false,
])
<form {{ $attributes }} novalidate @if ($haveImage) enctype="multipart/form-data" @endif>
    @csrf
    {{ $slot }}
</form>

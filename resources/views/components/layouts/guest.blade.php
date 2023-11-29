<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/admin.css'])
    @livewireStyles
    @stack('styles')
</head>

<body class="bg-slate-50 antialiased dark:bg-slate-950">
    <div class="mx-auto my-auto flex h-screen flex-col items-center justify-center py-4">
        <div class="mb-4">
            <img src="{{ asset('assets/arabdalla-logo.png') }}" alt="" class="h-20" />
        </div>
        {{ $slot }}
    </div>
    @livewireScripts
    @stack('scripts')
</body>

</html>

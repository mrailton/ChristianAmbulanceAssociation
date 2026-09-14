<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Supporting Christian ambulance people, their colleagues and their community.">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <title>{{ $title ?? 'Christian Ambulance Association' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col">
    <div class="shrink-0">
        <x-navbar />
    </div>

    @if (session('success') || session('error') || session('warning') || session('info'))
        <div class="fixed inset-x-4 bottom-4 z-50 flex flex-col gap-3 sm:left-auto sm:right-6 sm:max-w-md">
            @foreach (['success', 'error', 'warning', 'info'] as $type)
                @if (session($type))
                    <x-flash-message :type="$type" :message="session($type)" />
                @endif
            @endforeach
        </div>
    @endif

    <main class="flex-1">
        {{ $slot }}
    </main>
    <footer id="contact" class="shrink-0 bg-caa-forest text-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-6 px-6 py-10 sm:flex-row sm:items-center sm:justify-between lg:px-8">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo.png') }}" alt="" class="h-14 w-auto brightness-0 invert">
                <p class="max-w-xs text-sm leading-6 text-green-100">Supporting Christian ambulance people, their colleagues and their community.</p>
            </div>
            <p class="text-sm text-green-100">Charity Number 1190610</p>
            <p class="text-sm text-green-100">© {{ date('Y') }} Christian Ambulance Association</p>
        </div>
    </footer>
</body>
</html>

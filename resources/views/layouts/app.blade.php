<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;800&amp;family=Plus+Jakarta+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-paper font-sans text-ink">

    {{-- Bar info paling atas --}}
    <div class="bg-ink text-sm text-lav">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-x-6 gap-y-1 px-6 py-2">
            <span class="flex flex-wrap gap-x-6">
                <span>WhatsApp {{ config('shop.whatsapp') }}</span>
                <span>Order dibuka {{ config('shop.hours') }}</span>
            </span>
            <span class="flex gap-5">
                @foreach (config('shop.socials') as $name => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener" class="hover:underline">{{ $name }}</a>
                @endforeach
            </span>
        </div>
    </div>

    {{-- Menu utama --}}
    <header class="border-b border-lav bg-white">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-x-7 gap-y-3 px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 font-display text-xl font-extrabold">
                <img src="{{ asset('images/logo.svg') }}" alt="" aria-hidden="true" class="h-10 w-10 object-contain">
                {{ config('app.name') }}
            </a>
            <nav class="flex flex-wrap gap-x-6 gap-y-2 font-semibold">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ url('/#layanan') }}">Layanan</a>
                <a href="{{ url('/#portofolio') }}">Portofolio</a>
                <a href="{{ url('/#harga') }}">Harga</a>
                <a href="{{ url('/#tentang') }}">Tentang</a>
                <a href="{{ route('order.track') }}">Cek Order</a>
            </nav>
            <a href="{{ url('/#layanan') }}" class="btn">Order sekarang</a>
        </div>
    </header>

    <main>@yield('content')</main>

    {{-- Footer --}}
    <footer class="border-t border-white/10 bg-ink text-lav">
        <div class="mx-auto grid max-w-6xl gap-10 px-6 py-14 md:grid-cols-[1.4fr_1fr_1fr]">
            <div>
                <p class="font-display text-2xl font-extrabold text-white">{{ config('app.name') }}</p>
                <p class="mt-3 max-w-xs">Gambar custom dan edit motion picture.</p>
            </div>
            <div class="grid content-start gap-2">
                <p class="font-display text-lg font-bold text-white">Menu</p>
                <a href="{{ url('/#layanan') }}">Layanan</a>
                <a href="{{ url('/#harga') }}">Harga</a>
                <a href="{{ route('order.track') }}">Cek Order</a>
                <a href="{{ route('login') }}">Login Admin</a>
            </div>
            <div class="grid content-start gap-2">
                <p class="font-display text-lg font-bold text-white">Kontak</p>
                <a href="https://wa.me/{{ config('shop.whatsapp') }}" target="_blank" rel="noopener">WhatsApp</a>
                @foreach (config('shop.socials') as $name => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener">{{ $name }}</a>
                @endforeach
            </div>
        </div>
        <p class="mx-auto max-w-6xl px-6 pb-8 text-sm">© {{ date('Y') }} {{ config('app.name') }}</p>
    </footer>
</body>
</html>
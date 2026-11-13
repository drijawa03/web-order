@extends('layouts.app')

@section('content')

<section class="overflow-hidden bg-paper">
    <div class="mx-auto grid max-w-6xl items-center gap-10 px-6 py-14 md:py-20 lg:grid-cols-2 lg:gap-16">
        <div class="relative z-10">
            <p class="mb-4 inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-bold text-brand shadow-sm">
                <span class="h-2 w-2 rounded-full bg-gold"></span>
                Ilustrasi custom & motion picture
            </p>
            <h1 class="max-w-xl font-display text-5xl font-extrabold leading-[1.05] tracking-tight text-ink md:text-7xl">
                Karya kecil,<br>
                <span class="text-brand">cerita besar.</span>
            </h1>
            <p class="mt-5 max-w-md text-lg text-slate-600">Bawa idemu, biar saya gambar.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="#layanan" class="btn-gold">Lihat layanan <span aria-hidden="true" class="ml-2">↗</span></a>
                <a href="{{ route('order.track') }}" class="inline-flex min-h-11 items-center gap-2 rounded-md border-2 border-ink px-5 font-bold text-ink hover:bg-white">
                    Cek order
                </a>
            </div>
            <div class="mt-10 flex items-center gap-3 text-sm font-semibold text-slate-600">
                <span class="flex -space-x-2">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-paper bg-gold text-ink">✦</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-paper bg-lav text-brand">✎</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-paper bg-brand text-white">♡</span>
                </span>
                Dibuat khusus untukmu
            </div>
        </div>

        <div class="relative mx-auto w-full max-w-lg">
            <div class="absolute -right-4 top-4 h-64 w-64 rounded-full bg-gold md:h-80 md:w-80"></div>
            <div class="absolute -left-2 bottom-6 h-24 w-24 rounded-full bg-lav"></div>
            <div class="relative mx-auto aspect-[4/4.2] max-w-[410px] rotate-2 rounded-[2rem] border-[10px] border-white bg-[#f7b7a5] p-4 shadow-[0_24px_70px_-25px_rgba(14,18,48,0.45)]">
                <div class="flex h-full items-center justify-center overflow-hidden rounded-[1.3rem] bg-[#f9ddc9]">
                    <img
                        src="/images/violet.svg"
                        alt="Ilustrasi wajah dengan bunga"
                        class="h-full w-full object-contain"
                    >
                </div>
                <span class="absolute -bottom-5 -left-7 flex h-16 w-16 -rotate-12 items-center justify-center rounded-full bg-brand font-display text-2xl font-extrabold text-white shadow-lg">✦</span>
            </div>
            <div class="absolute -right-2 bottom-10 -rotate-6 rounded-xl bg-white px-4 py-3 font-display text-sm font-extrabold text-ink shadow-lg md:-right-8">
                My Bini😘.
            </div>
        </div>
    </div>
</section>

<section id="layanan" class="scroll-mt-6 px-6 py-16 md:py-20">
    <div class="mx-auto max-w-6xl">
        <div class="mb-8 flex flex-wrap items-end justify-between gap-4">
            <div>
                <p class="font-bold uppercase tracking-[0.2em] text-brand">Pilih favoritmu</p>
                <h2 class="mt-2 font-display text-3xl font-extrabold md:text-4xl">Mau bikin apa?</h2>
            </div>
            <a href="#harga" class="font-bold text-brand underline decoration-gold decoration-2 underline-offset-4">Lihat harga</a>
        </div>
        <div class="grid gap-5 md:grid-cols-2">
            <a href="{{ route('order.create', 'gambar') }}" class="group grid min-h-64 overflow-hidden rounded-3xl border-2 border-ink bg-white transition hover:-translate-y-1 hover:shadow-[8px_8px_0_#FFC531] sm:grid-cols-[1fr_.8fr]">
                <div class="flex flex-col items-start justify-center p-7 md:p-9">
                    <span class="rounded-full bg-lav px-3 py-1 text-xs font-extrabold uppercase tracking-wider text-brand">Gambar custom</span>
                    <h3 class="mt-4 font-display text-3xl font-extrabold">Jadi karya.</h3>
                    <p class="mt-2 text-slate-600">Cetak, bingkai, atau gantungan.</p>
                    <span class="mt-6 font-bold text-brand group-hover:translate-x-1">Order gambar <span aria-hidden="true">→</span></span>
                </div>
                <div class="flex items-center justify-center bg-[#f8e6d3] p-5">
                    <svg viewBox="0 0 180 180" role="img" aria-label="Ilustrasi gambar dalam bingkai" class="h-40 w-40 rotate-3 drop-shadow-xl">
                        <rect x="22" y="12" width="136" height="156" rx="8" fill="#2438D8"/>
                        <rect x="32" y="22" width="116" height="136" rx="4" fill="#FFF9EE"/>
                        <circle cx="91" cy="77" r="38" fill="#FFC531"/>
                        <path d="M49 138c6-29 20-43 42-43s36 14 42 43" fill="#F28C76"/>
                        <path d="M66 74c0-25 9-39 26-39 19 0 28 15 28 39v16c0 22-11 36-28 36S66 112 66 90z" fill="#D98D69"/>
                        <path d="M73 80h1m34 0h1" stroke="#38253A" stroke-linecap="round" stroke-width="5"/>
                        <path d="M83 96c6 5 12 5 18 0" fill="none" stroke="#9A4A48" stroke-linecap="round" stroke-width="3"/>
                        <path d="M130 37l4 8 9 1-7 6 2 9-8-4-8 4 2-9-7-6 9-1z" fill="#F28C76"/>
                    </svg>
                </div>
            </a>

            <a href="{{ route('order.create', 'motion') }}" class="group grid min-h-64 overflow-hidden rounded-3xl bg-ink text-white transition hover:-translate-y-1 hover:shadow-[8px_8px_0_#FFC531] sm:grid-cols-[1fr_.8fr]">
                <div class="flex flex-col items-start justify-center p-7 md:p-9">
                    <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-extrabold uppercase tracking-wider text-gold">Motion picture</span>
                    <h3 class="mt-4 font-display text-3xl font-extrabold">Beri gerak.</h3>
                    <p class="mt-2 text-lav">Half body atau full body.</p>
                    <span class="mt-6 font-bold text-gold group-hover:translate-x-1">Order motion <span aria-hidden="true">→</span></span>
                </div>
                <div class="relative flex items-center justify-center overflow-hidden bg-brand p-5">
                    <div class="absolute h-36 w-36 rounded-full border border-white/30"></div>
                    <div class="absolute h-48 w-48 rounded-full border border-white/20"></div>
                    <svg viewBox="0 0 180 180" role="img" aria-label="Ilustrasi karakter bergerak" class="relative h-40 w-40">
                        <path d="M43 149c8-39 24-57 48-57s40 18 48 57" fill="#FFC531"/>
                        <path d="M64 69c0-27 10-42 28-42 20 0 30 17 30 42v19c0 23-12 38-30 38S64 111 64 88z" fill="#E8A77E"/>
                        <path d="M58 67c4-29 16-44 37-44 20 0 31 13 34 39-16-3-31-12-45-24-5 14-14 24-26 29z" fill="#30233D"/>
                        <path d="M77 75h1m29 0h1" stroke="#30233D" stroke-linecap="round" stroke-width="5"/>
                        <path d="M83 92c5 5 11 5 16 0" fill="none" stroke="#A64F50" stroke-linecap="round" stroke-width="3"/>
                        <path d="M37 69l-12-8m18-6-7-13m94 44 14-4m-13-14 11-11" stroke="#FFF9EE" stroke-linecap="round" stroke-width="4"/>
                        <path d="M137 35l4 8 9 1-7 6 2 9-8-4-8 4 2-9-7-6 9-1z" fill="#FFC531"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</section>

<section id="harga" class="scroll-mt-6 bg-white px-6 py-14 md:py-16">
    <div class="mx-auto grid max-w-6xl gap-8 md:grid-cols-[.7fr_1.3fr] md:items-start">
        <div>
            <p class="font-bold uppercase tracking-[0.2em] text-brand">Tanpa kejutan</p>
            <h2 class="mt-2 font-display text-3xl font-extrabold">Harga mulai</h2>
        </div>
        <div class="grid gap-x-8 sm:grid-cols-2">
            @foreach (config('shop.prices') as $layanan => $harga)
                <div class="flex justify-between gap-3 border-b border-lav py-3 text-sm">
                    <span class="font-semibold">{{ $layanan }}</span>
                    <span class="shrink-0 text-slate-600">{{ str_replace('Mulai ', '', $harga) }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="portofolio" class="scroll-mt-6 px-6 py-16 md:py-20">
    <div class="mx-auto max-w-6xl">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <p class="font-bold uppercase tracking-[0.2em] text-brand">Sedikit inspirasi</p>
                <h2 class="mt-2 font-display text-3xl font-extrabold md:text-4xl">Karya terbaru</h2>
            </div>
        </div>
        @if ($gallery->isEmpty())
            <div class="mt-8 grid grid-cols-2 gap-3 md:grid-cols-4">
                <div class="col-span-2 row-span-2 flex min-h-64 items-center justify-center overflow-hidden rounded-3xl bg-[#f7b7a5] p-8">
                    <svg viewBox="0 0 240 240" role="img" aria-label="Ilustrasi abstrak matahari dan bunga" class="h-52 w-52">
                        <circle cx="120" cy="120" r="83" fill="#FFC531"/>
                        <path d="M29 207c35-43 74-56 116-39 25 10 46 7 65-10" fill="none" stroke="#2438D8" stroke-linecap="round" stroke-width="15"/>
                        <path d="M91 164c0-38 10-60 29-66 18-6 32 8 34 31 3 31-13 49-36 49-9 0-18-5-27-14z" fill="#F9DDC9"/>
                        <circle cx="113" cy="131" r="4" fill="#38253A"/><circle cx="137" cy="127" r="4" fill="#38253A"/>
                        <path d="M116 145c7 5 13 4 18-2" fill="none" stroke="#9A4A48" stroke-linecap="round" stroke-width="4"/>
                        <path d="M53 51l6 13 14 2-10 9 3 14-13-7-12 7 2-14-10-9 14-2z" fill="#FFF9EE"/>
                        <path d="M188 68l5 10 11 2-8 8 2 11-10-5-10 5 2-11-8-8 11-2z" fill="#F28C76"/>
                    </svg>
                </div>
                <div class="flex min-h-32 items-center justify-center overflow-hidden rounded-3xl bg-lav p-4">
                    <svg viewBox="0 0 120 120" role="img" aria-label="Ilustrasi bunga" class="h-24 w-24">
                        <path d="M60 106V60m0 26c-18-19-33-10-29 2 5 13 22 9 29-2zm0-13c17-17 31-9 27 3-5 12-20 8-27-3z" fill="none" stroke="#2438D8" stroke-linecap="round" stroke-width="5"/>
                        <circle cx="60" cy="43" r="13" fill="#FFC531"/><circle cx="60" cy="20" r="12" fill="#F28C76"/><circle cx="82" cy="43" r="12" fill="#F28C76"/><circle cx="60" cy="66" r="12" fill="#F28C76"/><circle cx="38" cy="43" r="12" fill="#F28C76"/>
                    </svg>
                </div>
                <div class="flex min-h-32 items-center justify-center overflow-hidden rounded-3xl bg-gold p-4">
                    <svg viewBox="0 0 120 120" role="img" aria-label="Ilustrasi bintang" class="h-24 w-24">
                        <path d="M60 8l13 31 34 3-26 22 8 34-29-18-29 18 8-34L13 42l34-3z" fill="#2438D8"/>
                        <circle cx="60" cy="58" r="12" fill="#FFF9EE"/>
                    </svg>
                </div>
            </div>
        @else
            <div class="mt-8 grid auto-rows-[180px] grid-cols-2 gap-4 md:grid-cols-4">
                @foreach ($gallery as $file)
                    <img src="{{ asset('portfolio/' . $file->getFilename()) }}" alt="Karya {{ $loop->iteration }}"
                         class="h-full w-full rounded-2xl object-cover {{ $loop->first ? 'col-span-2 row-span-2' : '' }}">
                @endforeach
            </div>
        @endif
    </div>
</section>

<section id="tentang" class="scroll-mt-6 border-t border-white/10 bg-ink px-6 py-12 text-white">
    <div class="mx-auto grid max-w-6xl gap-8 md:grid-cols-[1.1fr_0.9fr] md:items-center">
        <div>
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-gold">Drijawa Studio</p>
            <h2 class="mt-2 font-display text-2xl font-extrabold md:text-3xl">Tentang saya</h2>
            <p class="mt-4 max-w-xl text-base leading-8 text-slate-200">
                {{ config('shop.about') }}
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                @foreach (config('shop.socials', []) as $name => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener" class="inline-flex items-center rounded-full border border-white/20 bg-white/5 px-4 py-2 text-sm font-bold text-white transition hover:border-gold hover:text-gold">
                        {{ ucfirst($name) }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-4 shadow-[0_24px_70px_-30px_rgba(0,0,0,0.7)] md:p-6">
            <div class="overflow-hidden rounded-[1.5rem] border border-white/10 bg-gradient-to-br from-[#fbe6d9] via-[#f7b7a5] to-[#dfe5ff]">
                @php
                    $profileImage = config('shop.profile_image');
                    $profileImageUrl = str_starts_with((string) $profileImage, 'http') ? $profileImage : asset($profileImage);
                @endphp
                <img
                    src="{{ $profileImageUrl }}"
                    alt="Profil {{ config('shop.profile_name', 'Drijawa Studio') }}"
                    class="h-72 w-full object-cover object-center"
                    onerror="this.style.display='none'; this.nextElementSibling.hidden = false;"
                >
                <div class="hidden h-72 w-full items-center justify-center">
                    <svg viewBox="0 0 520 520" role="img" aria-label="Fallback profile illustration" class="h-52 w-52">
                        <circle cx="260" cy="180" r="110" fill="#FFC531"/>
                        <path d="M105 400C132 330 186 285 260 285C334 285 388 330 415 400" fill="#2438D8"/>
                        <path d="M175 175C175 122 215 90 260 90C305 90 345 122 345 175V190C345 242 310 272 260 272C210 272 175 242 175 190V175Z" fill="#F3C7A2"/>
                        <circle cx="225" cy="214" r="9" fill="#2E2240"/>
                        <circle cx="295" cy="214" r="9" fill="#2E2240"/>
                        <path d="M228 258C246 272 274 272 292 258" stroke="#9A4A48" stroke-width="8" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class="mt-5 flex items-center gap-4">
                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-gold font-display text-2xl font-extrabold text-ink">D</div>
                <div>
                    <p class="text-sm uppercase tracking-[0.2em] text-gold">Pemilik</p>
                    <h3 class="mt-1 text-xl font-extrabold text-white">{{ config('shop.profile_name', 'Muhammad Irianto') }}</h3>
                </div>
            </div>
            <p class="mt-4 text-sm text-slate-200">{{ config('shop.profile_role', 'Illustrator & Motion Picture') }}</p>
            <a href="https://wa.me/{{ config('shop.whatsapp') }}" target="_blank" rel="noopener" class="btn-gold mt-6">Ngobrol di WhatsApp <span aria-hidden="true" class="ml-2">↗</span></a>
        </div>
    </div>
</section>

@endsection

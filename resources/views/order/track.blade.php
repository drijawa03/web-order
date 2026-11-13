@extends('layouts.app')

@section('title', 'Cek order')

@section('content')
<div class="mx-auto max-w-xl px-6 py-12">
    <h1 class="font-display text-4xl font-extrabold">Cek status order</h1>
    <p class="mt-2 text-slate-600">Masukkan kode order dan nomor WhatsApp yang kamu pakai saat order.</p>

    <form method="POST" action="{{ route('order.track.check') }}" class="mt-6 space-y-4">
        @csrf
        <label class="block font-semibold">Kode order
            <input type="text" name="code" value="{{ old('code') }}" placeholder="ORD-XXXXXX" class="field mt-1" required>
        </label>
        <label class="block font-semibold">Nomor WhatsApp
            <input type="tel" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="0812xxxxxxxx" class="field mt-1" required>
        </label>
        @foreach ($errors->all() as $error)
            <p class="font-semibold text-red-700">{{ $error }}</p>
        @endforeach
        <button type="submit" class="btn">Cek order</button>
    </form>

    @if ($order)
        @php
            $steps   = ['baru' => 'Order baru', 'diproses' => 'Sedang dikerjakan', 'selesai' => 'Selesai'];
            $current = array_search($order->status === 'revisi' ? 'diproses' : $order->status, array_keys($steps));
        @endphp

        <div class="mt-10 border-2 border-ink bg-white p-6 shadow-[10px_10px_0_#FFC531]">
            <div class="flex items-center justify-between gap-3 border-b-2 border-ink pb-3">
                <span class="font-bold">Kartu order</span>
                <span class="font-display text-2xl font-extrabold">{{ $order->code }}</span>
            </div>

            <div class="flex justify-between gap-4 border-b border-lav py-3">
                <span class="text-slate-600">Layanan</span><b>{{ $order->serviceLabel() }}</b>
            </div>
            @foreach ($order->details ?? [] as $label => $value)
                <div class="flex justify-between gap-4 border-b border-lav py-3">
                    <span class="text-slate-600">{{ $label }}</span><b>{{ $value }}</b>
                </div>
            @endforeach
            <div class="flex justify-between gap-4 py-3">
                <span class="text-slate-600">Tanggal order</span><b>{{ $order->created_at->translatedFormat('d F Y') }}</b>
            </div>

            @if ($order->status === 'batal')
                <p class="my-4 bg-lav p-3 font-bold">Order ini dibatalkan.</p>
            @else
                <ol class="my-6 grid grid-cols-3 gap-3 text-center">
                    @foreach ($steps as $stepLabel)
                        <li>
                            <span class="inline-flex h-11 w-11 items-center justify-center rounded-full border-2 border-ink font-extrabold {{ $loop->index < $current ? 'bg-brand text-white' : ($loop->index === $current ? 'bg-gold' : 'bg-white') }}">{{ $loop->iteration }}</span>
                            <p class="mt-2 text-sm font-bold">{{ $stepLabel }}</p>
                        </li>
                    @endforeach
                </ol>
                @if ($order->status === 'revisi')
                    <p class="mb-4 font-semibold">Status saat ini: Revisi.</p>
                @endif
            @endif

            @if ($order->admin_note)
                <div class="bg-paper p-4">
                    <p class="font-bold">Catatan dari admin</p>
                    <p class="mt-1 text-slate-600">{{ $order->admin_note }}</p>
                </div>
            @endif

            <a href="https://wa.me/{{ config('shop.whatsapp') }}" target="_blank" rel="noopener" class="btn-gold mt-5">Hubungi admin lewat WhatsApp</a>
        </div>
    @endif
</div>
@endsection
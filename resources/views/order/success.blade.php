@extends('layouts.app')

@section('title', 'Order terkirim')

@section('content')
<div class="mx-auto max-w-xl px-6 py-16 text-center">
    <h1 class="font-display text-4xl font-extrabold">Order terkirim</h1>
    <p class="mt-3">Simpan kode order ini untuk cek status:</p>

    <p class="my-6 border-2 border-ink bg-white py-4 font-display text-4xl font-extrabold tracking-wider">{{ $order->code }}</p>

    <a href="{{ $waLink }}" target="_blank" rel="noopener" class="btn-gold">Konfirmasi lewat WhatsApp</a>

    <p class="mt-6"><a href="{{ route('order.track') }}" class="font-semibold underline">Cek status order</a></p>
</div>
@endsection
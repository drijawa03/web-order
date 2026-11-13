@extends('layouts.app')

@section('title', 'Detail ' . $order->code)

@section('content')
<div class="mx-auto max-w-3xl px-6 py-10">
    <a href="{{ route('admin.orders') }}" class="font-semibold underline">Kembali ke daftar</a>
    <h1 class="mb-6 mt-4 font-display text-3xl font-extrabold">{{ $order->code }}</h1>

    @if (session('ok'))
        <p class="mb-6 bg-gold p-3 font-semibold">{{ session('ok') }}</p>
    @endif

    <div class="border-2 border-ink bg-white p-6">
        <div class="flex justify-between gap-4 border-b border-lav py-3">
            <span class="text-slate-600">Nama</span><b>{{ $order->customer_name }}</b>
        </div>
        <div class="flex justify-between gap-4 border-b border-lav py-3">
            <span class="text-slate-600">WhatsApp</span>
            <a href="https://wa.me/{{ $order->whatsapp }}" target="_blank" rel="noopener" class="font-bold underline">{{ $order->whatsapp }}</a>
        </div>
        <div class="flex justify-between gap-4 border-b border-lav py-3">
            <span class="text-slate-600">Layanan</span><b>{{ $order->serviceLabel() }}</b>
        </div>
        @foreach ($order->details ?? [] as $label => $value)
            <div class="flex justify-between gap-4 border-b border-lav py-3">
                <span class="text-slate-600">{{ $label }}</span><b>{{ $value }}</b>
            </div>
        @endforeach
        @if ($order->reference_link)
            <div class="flex justify-between gap-4 border-b border-lav py-3">
                <span class="text-slate-600">Link referensi</span>
                <a href="{{ $order->reference_link }}" target="_blank" rel="noopener" class="break-all font-bold underline">{{ $order->reference_link }}</a>
            </div>
        @endif
        <div class="py-3">
            <p class="text-slate-600">Catatan pelanggan</p>
            <p class="mt-1">{{ $order->notes ?: '-' }}</p>
        </div>
    </div>

    @if ($order->photo_path)
        <a href="{{ asset('storage/' . $order->photo_path) }}" target="_blank" rel="noopener">
            <img src="{{ asset('storage/' . $order->photo_path) }}" alt="Gambar dari pelanggan" class="mt-6 max-h-96 border-2 border-ink">
        </a>
    @endif

    <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="mt-8 space-y-4 border-2 border-ink bg-white p-6">
        @csrf
        @method('PATCH')

        <label class="block font-semibold">Status
            <select name="status" class="field mt-1">
                @foreach (config('shop.statuses') as $key => $label)
                    <option value="{{ $key }}" @selected($order->status === $key)>{{ $label }}</option>
                @endforeach
            </select>
        </label>

        <label class="block font-semibold">Catatan untuk pelanggan
            <textarea name="admin_note" rows="3" class="field mt-1 py-2">{{ old('admin_note', $order->admin_note) }}</textarea>
        </label>

        <div class="flex flex-wrap gap-3">
            <button type="submit" class="btn">Simpan</button>
            <a href="https://wa.me/{{ $order->whatsapp }}" target="_blank" rel="noopener" class="btn-gold">Chat di WhatsApp</a>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Order masuk')

@section('content')
@php
    // Warna label status
    $chip = [
        'baru'     => 'bg-brand text-white',
        'diproses' => 'bg-gold',
        'revisi'   => 'border-2 border-ink bg-white',
        'selesai'  => 'bg-ink text-white',
        'batal'    => 'bg-slate-200',
    ];
@endphp
<div class="mx-auto max-w-6xl px-6 py-10">
    <div class="flex items-center justify-between gap-4">
        <div>
            <h1 class="font-display text-3xl font-extrabold">Order masuk</h1>
            <p class="mt-1 text-sm text-slate-600">
                Profil admin: {{ auth()->user()->name }} ({{ auth()->user()->email }})
            </p>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="font-semibold underline">Keluar</button>
        </form>
    </div>

    {{-- Tab filter status --}}
    <div class="mt-6 flex flex-wrap gap-2">
        <a href="{{ route('admin.orders') }}" class="btn-gold">Semua</a>
        @foreach (config('shop.statuses') as $key => $label)
            <a href="{{ route('admin.orders', ['status' => $key]) }}" class="inline-flex min-h-11 items-center rounded-md border-2 border-ink bg-white px-4 font-semibold">
                {{ $label }} ({{ $counts[$key] ?? 0 }})
            </a>
        @endforeach
    </div>

    <div class="mt-6 overflow-x-auto border-2 border-ink bg-white">
        <table class="w-full min-w-[640px] text-left">
            <thead class="bg-ink text-white">
                <tr>
                    <th class="p-3">Kode</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Layanan</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3"><span class="sr-only">Aksi</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="border-t border-lav">
                        <td class="p-3 font-bold">{{ $order->code }}</td>
                        <td class="p-3">{{ $order->customer_name }}</td>
                        <td class="p-3">{{ $order->serviceLabel() }}</td>
                        <td class="p-3">
                            <span class="rounded px-2.5 py-1 text-sm font-bold {{ $chip[$order->status] ?? 'bg-slate-200' }}">{{ $order->statusLabel() }}</span>
                        </td>
                        <td class="p-3">{{ $order->created_at->translatedFormat('d M Y, H:i') }}</td>
                        <td class="p-3"><a href="{{ route('admin.orders.show', $order) }}" class="font-semibold underline">Detail</a></td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="p-6 text-center">Belum ada order.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $orders->links() }}</div>
</div>
@endsection
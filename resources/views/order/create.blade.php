@extends('layouts.app')

@section('title', 'Form order')

@section('content')
<div class="mx-auto max-w-3xl px-6 py-12">
    <h1 class="font-display text-4xl font-extrabold">
        Order {{ $type === 'gambar' ? 'Gambar' : 'Motion Picture Edit' }}
    </h1>

    @if ($errors->any())
        <div class="mt-6 border-2 border-ink bg-gold p-4">
            <p class="font-bold">Ada yang perlu diperbaiki:</p>
            <ul class="list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('order.store', $type) }}" enctype="multipart/form-data"
          class="mt-8 space-y-6 border-2 border-ink bg-white p-6 md:p-8"
          x-data="{ output: '{{ old('output', 'kertas') }}', source: '{{ old('source', 'upload') }}' }">
        @csrf

        <label class="block font-semibold">Nama lengkap
            <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="field mt-1" required>
        </label>

        <label class="block font-semibold">Nomor WhatsApp
            <input type="tel" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="0812xxxxxxxx" class="field mt-1" required>
        </label>

        @if ($type === 'gambar')
            {{-- ===== Isian layanan Gambar ===== --}}
            <label class="block font-semibold">Upload foto atau gambar referensi
                <input type="file" name="photo" accept="image/*" class="field mt-1 py-2" required>
            </label>

            <fieldset>
                <legend class="font-semibold">Bentuk hasil</legend>
                <label class="mr-5 inline-flex min-h-11 items-center gap-2">
                    <input type="radio" name="output" value="kertas" x-model="output"> Cetak di kertas
                </label>
                <label class="mr-5 inline-flex min-h-11 items-center gap-2">
                    <input type="radio" name="output" value="bingkai" x-model="output"> Dengan bingkai
                </label>
                <label class="inline-flex min-h-11 items-center gap-2">
                    <input type="radio" name="output" value="gantungan" x-model="output"> Gantungan kunci
                </label>
            </fieldset>

            <template x-if="output !== 'gantungan'">
                <div class="grid gap-4 sm:grid-cols-2">
                    <label class="block font-semibold">Jenis kertas
                        <select name="paper" class="field mt-1">
                            @foreach (config('shop.papers') as $item)
                                <option @selected(old('paper') === $item)>{{ $item }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block font-semibold">Ukuran
                        <select name="size" class="field mt-1">
                            @foreach (config('shop.sizes') as $item)
                                <option @selected(old('size') === $item)>{{ $item }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </template>

            <template x-if="output === 'bingkai'">
                <label class="block font-semibold">Warna bingkai
                    <select name="frame" class="field mt-1">
                        @foreach (config('shop.frames') as $item)
                            <option @selected(old('frame') === $item)>{{ $item }}</option>
                        @endforeach
                    </select>
                </label>
            </template>

            <template x-if="output === 'gantungan'">
                <label class="block font-semibold">Ukuran gantungan
                    <select name="keychain" class="field mt-1">
                        @foreach (config('shop.keychains') as $item)
                            <option @selected(old('keychain') === $item)>{{ $item }}</option>
                        @endforeach
                    </select>
                </label>
            </template>
        @else
            {{-- ===== Isian layanan Motion Picture Edit ===== --}}
            <fieldset>
                <legend class="font-semibold">Sumber gambar</legend>
                <label class="mr-5 inline-flex min-h-11 items-center gap-2">
                    <input type="radio" name="source" value="upload" x-model="source"> Upload gambar sendiri
                </label>
                <label class="inline-flex min-h-11 items-center gap-2">
                    <input type="radio" name="source" value="admin" x-model="source"> Dari admin
                </label>
            </fieldset>

            <template x-if="source === 'upload'">
                <label class="block font-semibold">Upload gambar
                    <input type="file" name="photo" accept="image/*" class="field mt-1 py-2" required>
                </label>
            </template>

            <template x-if="source === 'admin'">
                <p class="bg-lav p-3">Gambar akan disiapkan oleh admin. Tulis gambar atau karakter yang kamu mau di kolom catatan.</p>
            </template>

            <fieldset>
                <legend class="font-semibold">Ukuran karakter</legend>
                <label class="mr-5 inline-flex min-h-11 items-center gap-2">
                    <input type="radio" name="body" value="half" @checked(old('body', 'half') === 'half')> Half body
                </label>
                <label class="inline-flex min-h-11 items-center gap-2">
                    <input type="radio" name="body" value="full" @checked(old('body') === 'full')> Full body
                </label>
            </fieldset>

            <label class="block font-semibold">Link referensi edit
                <input type="url" name="reference_link" value="{{ old('reference_link') }}" placeholder="https://" class="field mt-1">
            </label>
        @endif

        <label class="block font-semibold">Catatan tambahan
            <textarea name="notes" rows="4" class="field mt-1 py-2">{{ old('notes') }}</textarea>
        </label>

        <button type="submit" class="btn-gold">Kirim order</button>
    </form>
</div>
@endsection
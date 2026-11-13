<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    // GET /order/gambar atau /order/motion: tampilkan form
    public function create(string $type)
    {
        return view('order.create', compact('type'));
    }

    // POST /order/{type}: periksa isian, lalu simpan order
    public function store(Request $request, string $type)
    {
        $data = $request->validate($this->rules($type), $this->messages(), $this->labels());

        // Pilihan order disimpan dengan tulisan yang mudah dibaca
        if ($type === 'gambar') {
            $details = [
                'Bentuk hasil' => [
                    'kertas' => 'Cetak di kertas',
                    'bingkai' => 'Dengan bingkai',
                    'gantungan' => 'Gantungan kunci',
                ][$data['output']],
                'Jenis kertas' => $data['paper'] ?? null,
                'Ukuran' => $data['size'] ?? null,
                'Bingkai' => $data['frame'] ?? null,
                'Gantungan' => $data['keychain'] ?? null,
            ];
        } else {
            $details = [
                'Sumber gambar' => $data['source'] === 'upload' ? 'Upload sendiri' : 'Dari admin',
                'Ukuran karakter' => $data['body'] === 'half' ? 'Half body' : 'Full body',
            ];
        }

        $order = Order::create([
            'service' => $type,
            'customer_name' => $data['customer_name'],
            'whatsapp' => Order::normalizePhone($data['whatsapp']),
            'details' => array_filter($details),
            'photo_path' => $request->hasFile('photo')
                ? $request->file('photo')->store('orders', 'public')
                : null,
            'reference_link' => $data['reference_link'] ?? null,
            'notes' => $data['notes'] ?? null,
        ]);

        return redirect()->route('order.success', $order->code);
    }

    // GET /order/sukses/{code}: tampilkan kode dan tombol WhatsApp
    public function success(string $code)
    {
        $order = Order::where('code', $code)->firstOrFail();

        $text = 'Halo, saya '.$order->customer_name.'. Saya baru order lewat web. '
            .'Kode order: '.$order->code.' ('.$order->serviceLabel().'). Mohon dicek ya.';

        $waLink = 'https://wa.me/'.config('shop.whatsapp').'?text='.rawurlencode($text);

        return view('order.success', compact('order', 'waLink'));
    }

    // GET /cek-order: tampilkan form cek
    public function trackForm()
    {
        return view('order.track', ['order' => null]);
    }

    // POST /cek-order: cari order dari kode dan nomor WhatsApp
    public function track(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string'],
            'whatsapp' => ['required', 'string'],
        ], $this->messages(), $this->labels());

        $order = Order::where('code', strtoupper(trim($request->code)))
            ->where('whatsapp', Order::normalizePhone($request->whatsapp))
            ->first();

        if (! $order) {
            return back()->withInput()->withErrors([
                'code' => 'Order tidak ditemukan. Periksa kode dan nomor WhatsApp kamu.',
            ]);
        }

        return view('order.track', compact('order'));
    }

    // Aturan validasi untuk tiap layanan
    private function rules(string $type): array
    {
        $common = [
            'customer_name' => ['required', 'string', 'max:100'],
            'whatsapp' => ['required', 'string', 'min:9', 'max:20'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];

        if ($type === 'gambar') {
            return $common + [
                'photo' => ['required', 'image', 'max:5120'],
                'output' => ['required', Rule::in(['kertas', 'bingkai', 'gantungan'])],
                'paper' => ['required_if:output,kertas,bingkai', Rule::in(config('shop.papers'))],
                'size' => ['required_if:output,kertas,bingkai', Rule::in(config('shop.sizes'))],
                'frame' => ['required_if:output,bingkai', Rule::in(config('shop.frames'))],
                'keychain' => ['required_if:output,gantungan', Rule::in(config('shop.keychains'))],
            ];
        }

        return $common + [
            'source' => ['required', Rule::in(['upload', 'admin'])],
            'photo' => ['required_if:source,upload', 'image', 'max:5120'],
            'body' => ['required', Rule::in(['half', 'full'])],
            'reference_link' => ['nullable', 'url:http,https', 'max:500'],
        ];
    }

    // Pesan error berbahasa Indonesia
    private function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'required_if' => ':attribute wajib diisi.',
            'in' => 'Pilihan :attribute tidak valid.',
            'image' => ':attribute harus berupa gambar (JPG, PNG, atau WEBP).',
            'uploaded' => ':attribute gagal diunggah. Coba file yang lebih kecil.',
            'url' => 'Link harus diawali http:// atau https://.',
            'min' => ':attribute terlalu pendek (minimal :min karakter).',
            'max' => ':attribute terlalu panjang (maksimal :max karakter).',
            'photo.max' => 'Foto maksimal 5 MB.',
        ];
    }

    // Nama isian yang tampil di pesan error
    private function labels(): array
    {
        return [
            'code' => 'Kode order',
            'customer_name' => 'Nama',
            'whatsapp' => 'Nomor WhatsApp',
            'notes' => 'Catatan',
            'photo' => 'Foto atau gambar',
            'output' => 'Bentuk hasil',
            'paper' => 'Jenis kertas',
            'size' => 'Ukuran',
            'frame' => 'Warna bingkai',
            'keychain' => 'Ukuran gantungan',
            'source' => 'Sumber gambar',
            'body' => 'Ukuran karakter',
            'reference_link' => 'Link referensi',
        ];
    }
}

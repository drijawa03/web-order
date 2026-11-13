<?php

return [
    'whatsapp' => env('SHOP_WHATSAPP'),

    'admin_email' => env('ADMIN_EMAIL'),
    'admin_password' => env('ADMIN_PASSWORD'),

    'hours' => 'setiap hari, 09.00 - 21.00 WIT',
    'profile_name' => 'Muhammad Irianto',
    'profile_role' => 'Illustrator & Motion Picture',
    'profile_image' => env('SHOP_PROFILE_IMAGE', '/images/profile.svg'),
    'about' => 'Halo, saya Muhammad Irianto. Saya mulai aktif menggambar dan mengedit motion picture sejak 2023. Dan sekarang sadang mendalami dan meningkatkan skill tersebut. Kirim order lewat web ini dan saya kabari progresnya.',

    'socials' => [
        'instagram' => 'https://www.instagram.com/drijawa.a/',
        'tiktok' => 'https://www.tiktok.com/@drilawutjawa',
    ],

    'papers' => ['Art Paper', 'Drawing Paper'],
    'sizes' => ['A5', 'A4'],
    'frames' => ['Hitam', 'Putih', 'Kayu natural'],
    'keychains' => ['Habis Stok'],

    'prices' => [
        'Gambar di kertas' => 'Mulai Rp 30.000 - Rp 100.000',
        'Gambar dengan bingkai' => 'Mulai Rp 45.000 - Rp 150.000',
        'Gantungan kunci' => 'Mulai Rp 10.000',
        'Motion picture edit, half body' => 'Mulai Rp 20.000',
        'Motion picture edit, full body' => 'Mulai Rp 50.000',
    ],

    'statuses' => [
        'baru' => 'Order baru',
        'diproses' => 'Sedang dikerjakan',
        'revisi' => 'Revisi',
        'selesai' => 'Selesai',
        'batal' => 'Dibatalkan',
    ],
];

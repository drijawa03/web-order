<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat (atau perbarui) akun admin dari pengaturan .env
        User::updateOrCreate(
            ['email' => config('shop.admin_email')],
            ['name' => 'Admin', 'password' => config('shop.admin_password')],
        );
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();     // kode order, contoh ORD-8F3K2A
            $table->string('customer_name');
            $table->string('whatsapp');           // format 62812...
            $table->string('service');            // gambar atau motion
            $table->json('details')->nullable();  // pilihan order
            $table->string('photo_path')->nullable();
            $table->string('reference_link')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('baru');
            $table->text('admin_note')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

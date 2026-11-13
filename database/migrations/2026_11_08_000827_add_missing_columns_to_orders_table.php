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
        Schema::table('orders', function (Blueprint $table) {
            if (! Schema::hasColumn('orders', 'code')) {
                $table->string('code')->nullable()->unique();
            }

            if (! Schema::hasColumn('orders', 'customer_name')) {
                $table->string('customer_name')->nullable();
            }

            if (! Schema::hasColumn('orders', 'whatsapp')) {
                $table->string('whatsapp')->nullable();
            }

            if (! Schema::hasColumn('orders', 'service')) {
                $table->string('service')->nullable();
            }

            if (! Schema::hasColumn('orders', 'details')) {
                $table->json('details')->nullable();
            }

            if (! Schema::hasColumn('orders', 'photo_path')) {
                $table->string('photo_path')->nullable();
            }

            if (! Schema::hasColumn('orders', 'reference_link')) {
                $table->string('reference_link')->nullable();
            }

            if (! Schema::hasColumn('orders', 'notes')) {
                $table->text('notes')->nullable();
            }

            if (! Schema::hasColumn('orders', 'status')) {
                $table->string('status')->default('baru');
            }

            if (! Schema::hasColumn('orders', 'admin_note')) {
                $table->text('admin_note')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        throw new LogicException('The orders schema repair cannot be rolled back safely.');
    }
};

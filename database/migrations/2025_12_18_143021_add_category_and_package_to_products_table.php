<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        // Tambahkan category_id jika belum ada
        if (!Schema::hasColumn('products', 'category_id')) {
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
        }

        // Tambahkan is_package jika belum ada
        if (!Schema::hasColumn('products', 'is_package')) {
            $table->boolean('is_package')->default(false);
        }

        // Tambahkan package_items jika belum ada
        if (!Schema::hasColumn('products', 'package_items')) {
            $table->text('package_items')->nullable();
        }

        // Tambahkan is_featured jika belum ada (Ini yang menyebabkan error)
        if (!Schema::hasColumn('products', 'is_featured')) {
            $table->boolean('is_featured')->default(false);
        }

        // Hapus kolom stock jika ada
        if (Schema::hasColumn('products', 'stock')) {
            $table->dropColumn('stock');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};

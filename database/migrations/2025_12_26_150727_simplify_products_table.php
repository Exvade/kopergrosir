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
        Schema::table('products', function (Blueprint $blueprint) {
            // Menghapus kolom yang sudah tidak digunakan
            $blueprint->dropColumn([
                'description', 
                'price', 
                'material', 
                'size', 
                'package_items'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $blueprint) {
            // Mengembalikan kolom jika migrasi di-rollback (opsional)
            $blueprint->text('description')->nullable();
            $blueprint->decimal('price', 15, 2)->default(0);
            $blueprint->string('material')->nullable();
            $blueprint->string('size')->nullable();
            $blueprint->text('package_items')->nullable();
        });
    }
};
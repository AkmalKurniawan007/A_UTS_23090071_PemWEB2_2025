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
        Schema::table('products', function (Blueprint $table) {
            // Menambahkan kolom category_id sebagai foreign key
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');  // Pastikan tabel 'product_categories' ada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Menghapus kolom category_id jika migration di-rollback
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};

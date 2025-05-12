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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // kolom id (bigint, auto increment, primary key)
            $table->string('title'); // kolom title (varchar)
            $table->string('slug')->unique(); // kolom slug (unique)
            $table->text('body'); // kolom body (text)
            $table->timestamps(); // kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

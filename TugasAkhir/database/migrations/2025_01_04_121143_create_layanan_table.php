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
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kode_layanan');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('kontak');
            $table->string('nama_layanan');
            $table->string('deskripsi');
            $table->decimal('harga_per_jam', 10, 2);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};

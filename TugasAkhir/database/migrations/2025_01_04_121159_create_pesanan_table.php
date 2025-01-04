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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('kode_pesanan');
            $table->string('harga');
            $table->string('nama_layanan');
            $table->bigInteger('layanan_id')->unsigned();
            $table->foreign('layanan_id')->references('id')->on('layanan');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};

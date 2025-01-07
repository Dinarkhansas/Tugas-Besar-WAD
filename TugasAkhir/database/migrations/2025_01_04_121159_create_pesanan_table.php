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
            $table->string('kode_pesanan')->unique();
            $table->integer('sewa_jam');
            $table->bigInteger('layanan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('layanan_id')->references('id')->on('layanan')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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

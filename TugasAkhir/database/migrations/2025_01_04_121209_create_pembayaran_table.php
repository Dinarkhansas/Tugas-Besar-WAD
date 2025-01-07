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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kode_pembayaran');
            $table->string('bukti_transfer')->nullable();
            $table->string('status')->default('pending');
            $table->bigInteger('pesanan_id')->unsigned();
            $table->foreign('pesanan_id')->references('id')->on('pesanan');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

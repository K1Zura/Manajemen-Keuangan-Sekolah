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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id')->nullable();
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('restrict');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('restrict');
            $table->unsignedBigInteger('tahun_ajaran_id')->nullable();
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans')->onDelete('restrict');
            $table->unsignedBigInteger('kategori_pembayaran_id')->nullable();
            $table->foreign('kategori_pembayaran_id')->references('id')->on('kategori_pembayarans')->onDelete('restrict');
            $table->boolean('validasi');
            $table->UnsignedInteger('nominal');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};

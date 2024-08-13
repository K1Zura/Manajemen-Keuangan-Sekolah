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
        Schema::create('kategori_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->String('kategori',20);
            $table->UnsignedInteger('nominal');
            $table->unsignedBigInteger('tahun_ajaran_id')->nullable();
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_pembayarans');
    }
};

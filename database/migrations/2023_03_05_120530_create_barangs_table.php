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
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama');
            $table->string('satuan');
            $table->string('jenis');
            $table->float('stok');
            $table->float('berat')->nullable();
            $table->integer('hargabeli');
            $table->string('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoribarangs');
            $table->integer('minimstok');
            $table->integer('untung');
            $table->integer('hargajual');
            $table->integer('stokawal');
            $table->integer('tambah');
            $table->bigInteger('total');
            $table->bigInteger('total_lama')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};

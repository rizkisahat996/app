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
        Schema::create('detail_jalans', function (Blueprint $table) {
            $table->foreignId('surat_id');
            $table->foreignId('barang_id');
            $table->float('jumlah',5, 1)->nullable();
            $table->integer('kuantitas')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_jalans');
    }
};

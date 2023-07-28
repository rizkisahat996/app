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
        Schema::create('log_transaksis', function (Blueprint $table) {
            $table->string('id');
            $table->integer('pelanggan_id');
            $table->string('kodefaktur');
            $table->string('kodejalan');
            $table->string('kodeproforma');
            $table->string('nomor_polisi')->nullable();
            $table->string('jenispembayaran')->nullable();
            $table->integer('pembayaran')->nullable();
            $table->integer('kembalian')->nullable();
            $table->string('action');
            $table->string('user_id');
            $table->string('total');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER log_insert_transaksi AFTER INSERT ON `transaksis` FOR EACH ROW BEGIN INSERT INTO log_transaksis (`id`, `pelanggan_id`,`kodefaktur`, `kodejalan`, `kodeproforma`, `nomor_polisi`, `jenispembayaran`, `pembayaran`, `kembalian`,`action`, `user_id`, `total`, `created_at`, `updated_at`) 
        VALUES (NEW.id, NEW.pelanggan_id,NEW.kodefaktur,NEW.kodejalan,NEW.kodeproforma,NEW.nomor_polisi,NEW.jenispembayaran,NEW.pembayaran,NEW.kembalian,"Insert", NEW.user_id,NEW.total, now(), null); END;
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_transaksi AFTER UPDATE ON `transaksis` FOR EACH ROW BEGIN INSERT INTO log_transaksis (`id`, `pelanggan_id`,`kodefaktur`, `kodejalan`, `kodeproforma`, `nomor_polisi`, `jenispembayaran`, `pembayaran`, `kembalian`,`action`, `user_id`, `total`, `created_at`, `updated_at`) 
        VALUES (NEW.id, NEW.pelanggan_id,NEW.kodefaktur,NEW.kodejalan,NEW.kodeproforma,NEW.nomor_polisi,NEW.jenispembayaran,NEW.pembayaran,NEW.kembalian,"Update", NEW.user_id,NEW.total, now(), null); END;
        ');
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_transaksis');
    }
};

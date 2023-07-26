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
        Schema::create('log_detail', function (Blueprint $table){
            $table->string('id_transaksi');
            $table->string('id_barang');
            $table->string('action');
            $table->integer('harga_jual');
            $table->integer('modal');
            $table->float('jumlah', 5, 1);
            $table->integer('subtotal');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER log_insert_detail AFTER INSERT ON `detailtransaksis` FOR EACH ROW BEGIN INSERT INTO log_detail (`id_transaksi`, `id_barang`, `action`, `harga_jual`,
        `modal`, `jumlah`,`subtotal`,  `created_at`,`updated_at`) 
        VALUES (NEW.id_transaksi, NEW.id_barang, "Insert",NEW.harga_jual, NEW.modal, NEW.jumlah, NEW.subtotal, now(), null); END
        ');
        DB::unprepared('
        CREATE TRIGGER log_update_detail AFTER UPDATE ON `detailtransaksis` FOR EACH ROW BEGIN INSERT INTO log_detail (`id_transaksi`, `id_barang`, `action`, `harga_jual`,
        `modal`, `jumlah`,`subtotal`,  `created_at`,`updated_at`) 
        VALUES (NEW.id_transaksi, NEW.id_barang, "Update", NEW.harga_jual, NEW.modal, NEW.jumlah, NEW.subtotal, now(), null); END
        ');
        DB::unprepared('
        CREATE TRIGGER log_delete_detail AFTER DELETE ON `detailtransaksis` FOR EACH ROW BEGIN INSERT INTO log_detail (`id_transaksi`, `id_barang`, `action`, `harga_jual`,
        `modal`, `jumlah`,`subtotal`,  `created_at`,`updated_at`) 
        VALUES (old.id_transaksi, old.id_barang, "Delete", old.harga_jual, old.modal, old.jumlah, old.subtotal, now(), null); END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_detail');
        DB::unprepared('DROP TRIGGER IF EXISTS  log_insert_detail');
        DB::unprepared('DROP TRIGGER IF EXISTS  log_update_detail');
        DB::unprepared('DROP TRIGGER IF EXISTS  log_delete_detail');
    }
};

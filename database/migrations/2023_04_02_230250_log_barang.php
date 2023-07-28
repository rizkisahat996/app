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
        Schema::create('log_barang', function (Blueprint $table) {
            $table->string('id_barang');
            $table->string('nama');
            $table->string('action');
            $table->integer('hargabeli');
            $table->integer('untung');
            $table->integer('stokawal')->nullable();
            $table->integer('stokkeluar')->nullable();
            $table->integer('tambah');
            $table->integer('hargajual');
            $table->integer('stok');
            $table->bigInteger('total');
            $table->bigInteger('total_lama')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        
        DB::unprepared('
        CREATE TRIGGER log_insert_barang AFTER INSERT ON `barangs` FOR EACH ROW BEGIN INSERT INTO log_barang (`id_barang`, `nama`, `action`, `hargabeli` ,
        `untung`, `stokawal`, `stokkeluar`,`tambah`, `hargajual`,`stok`, `total`, `total_lama`, `keterangan`, `created_at`,`updated_at`) 
        VALUES (NEW.id, NEW.nama, "Insert", NEW.hargabeli,NEW.untung, NEW.stokawal,NEW.stokkeluar, NEW.tambah, NEW.hargajual,NEW.stok, NEW.total, NEW.total_lama, NEW.keterangan, now(), null); END
        ');
        DB::unprepared('
        CREATE TRIGGER log_update_barang AFTER UPDATE ON `barangs` FOR EACH ROW BEGIN INSERT INTO log_barang (`id_barang`, `nama`, `action`, `hargabeli` ,
        `untung`, `stokawal`, `stokkeluar`,`tambah`, `hargajual`,`stok`, `total`, `total_lama`, `keterangan`,  `created_at`,`updated_at`) 
        VALUES (NEW.id, NEW.nama, "UPDATE", NEW.hargabeli,NEW.untung, NEW.stokawal,NEW.stokkeluar, NEW.tambah, NEW.hargajual,NEW.stok, NEW.total, NEW.total_lama, NEW.keterangan, now(), null); END
        ');
        DB::unprepared('
        CREATE TRIGGER log_delete_barang AFTER DELETE ON `barangs` FOR EACH ROW BEGIN INSERT INTO log_barang (`id_barang`, `nama`, `action`, `hargabeli` ,
        `untung`, `stokawal`, `stokkeluar`,`tambah`, `hargajual`,`stok`, `total`, `total_lama`, `keterangan`, `created_at`,`updated_at`) 
        VALUES (old.id, old.nama, "delete", old.hargabeli,old.untung, old.stokawal, old.stokkeluar,old.tambah, old.hargajual,old.stok, old.total, old.total_lama, old.keterangan, now(), null); END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_barang');
        DB::unprepared('DROP TRIGGER IF EXISTS  log_insert_barang');
        DB::unprepared('DROP TRIGGER IF EXISTS  log_update_barang');
        DB::unprepared('DROP TRIGGER IF EXISTS  log_delete_barang');
    }
};

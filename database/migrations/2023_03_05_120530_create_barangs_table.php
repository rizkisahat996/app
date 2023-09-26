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
            $table->float('berat')->nullable()->default(0);
            $table->integer('hargabeli');
            $table->string('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoribarangs');
            $table->integer('minimstok');
            $table->integer('untung');
            $table->integer('hargajual');
            $table->integer('stokawal')->nullable()->default(0);
            $table->integer('stokkeluar')->nullable()->default(0);
            $table->integer('tambah');
            $table->bigInteger('total');
            $table->bigInteger('total_lama')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        DB::unprepared('
            CREATE TRIGGER update_weight_trigger
            BEFORE INSERT ON barangs
            FOR EACH ROW
            BEGIN
                -- Set stokawal to 0 for new insertions
                SET NEW.stokawal = 0;

                -- Set total_lama to 0 for new insertions
                SET NEW.total_lama = 0;

                -- Calculate tambah and stokkeluar based on new stok value
                IF NEW.stok > 0 THEN
                    SET NEW.tambah = NEW.stok;
                    SET NEW.stokkeluar = 0;
                ELSE
                    SET NEW.stokkeluar = 0;
                    SET NEW.tambah = 0;
                END IF;

                -- Calculate and set the new berat value
                SET NEW.berat = NEW.stok * 25;
            END;
        ');

        DB::unprepared('
            CREATE TRIGGER update_weight_trigger_on_update
            BEFORE UPDATE ON barangs
            FOR EACH ROW
            BEGIN
                -- Calculate tambah and stokkeluar based on new and old stok values
                IF NEW.stok > OLD.stok THEN
                    SET NEW.tambah = NEW.stok - OLD.stok;
                    SET NEW.stokkeluar = 0;
                ELSE
                    SET NEW.stokkeluar = OLD.stok - NEW.stok;
                    SET NEW.tambah = 0;
                END IF;

                SET NEW.stokawal = OLD.stok;

                SET NEW.total_lama = OLD.total;
                SET NEW.berat = NEW.stok * 25;
            END;
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      'name' => 'admin',
      'email' => 'superadmin@gmail.com',
      'password' => Hash::make('password'),
      'jabatan' => 'superadmin',
    ]);
    DB::table('users')->insert([
      'name' => 'kasir',
      'email' => 'kasir@gmail.com',
      'password' => Hash::make('password'), 
      'jabatan' => 'kasir',
    ]);
    
    DB::table('pelanggans')->insert([
      'nama' => 'sahat',
      'perusahaan' => 'usu',
      'alamat' => 'medan',
      'no_telp' => '083115630741'
    ]);

    DB::table('kategoribarangs')->insert([
      'id' => 'kategori',
      'kategori' => 'kategori',
    ]);

    DB::table('barangs')->insert([
      'id' => '12312',
      'nama' => 'nama',
      'satuan' => 'satuan',
      'jenis' => 'jenis',
      'stok' => '100.00',
      'berat' => '2500.00',
      'hargabeli' => '10000',
      'id_kategori' => 'kategori',
      'minimstok' => '10',
      'untung' => '200',
      'stokawal' => '0',
      'tambah' => '200',
      'total' => '200',
      'hargajual' => '15000',
      'keterangan' => 'keterangan',
    ]);
    DB::table('barangs')->insert([
      'id' => '22',
      'nama' => 'wqw',
      'satuan' => 'satuan',
      'jenis' => 'jenis',
      'stok' => '100.00',
      'berat' => '2500.00',
      'hargabeli' => '10000',
      'id_kategori' => 'kategori',
      'minimstok' => '10',
      'untung' => '200',
      'stokawal' => '0',
      'tambah' => '200',
      'total' => '200',
      'hargajual' => '20000',
      'keterangan' => 'keterangan',
    ]);

  }
}
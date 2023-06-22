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
      'nama' => 'nama',
      'perusahaan' => 'perusahaan',
      'alamat' => 'alamat',
      'no_telp' => 'no_telp',
    ]);

    DB::table('kategoribarangs')->insert([
      'id' => '1',
      'kategori' => 'barang'
    ]);
    
    DB::table('barangs')->insert([
      'id' => '1',
      'nama' => 'nama',
      'satuan' => 'satuan',
      'hargabeli' => '1000',
      'id_kategori' => '1',
      'minimstok' => '10',
      'hargajual' => '10',
      'untung' => '10',
      'stok' => '10',
    ]);
  }
}
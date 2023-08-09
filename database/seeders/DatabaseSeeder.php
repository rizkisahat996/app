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

    DB::table('kategoribarangs')->insert([
      'id' => '1',
      'kategori' => 'THERMOPLASTIK TRISULA',
    ]);
    DB::table('kategoribarangs')->insert([
      'id' => '2',
      'kategori' => 'COLDPLASTIK TUNAS',
    ]);
    DB::table('kategoribarangs')->insert([
      'id' => '3',
      'kategori' => 'WARNING LIGHT',
    ]);
    DB::table('kategoribarangs')->insert([
      'id' => '4',
      'kategori' => 'TRAFFIE LIGHT',
    ]);
    DB::table('kategoribarangs')->insert([
      'id' => '5',
      'kategori' => 'PJU',
    ]);
    DB::table('kategoribarangs')->insert([
      'id' => '6',
      'kategori' => 'ETC',
    ]);
    DB::table('kategoribarangs')->insert([
      'id' => '7',
      'kategori' => 'RAMBU RAMBU',
    ]);


  }
}
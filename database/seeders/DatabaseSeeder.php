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
      'name' => 'Bobie',
      'email' => 'bobby.tarapribadi@gmail.com',
      'password' => Hash::make('Rinarafa124'),
      'jabatan' => 'superadmin',
    ]);
    DB::table('users')->insert([
      'name' => 'Bobie',
      'email' => 'superadmin@gmail.com',
      'password' => Hash::make('password'),
      'jabatan' => 'superadmin',
    ]);


  }
}
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
      'email' => 'admin@gmail.com',
      'password' => Hash::make('password'),
      'jabatan' => 'admin',
    ]);

    DB::table('users')->insert([
      'name' => Str::random(10),
      'email' => Str::random(10) . '@gmail.com',
      'password' => Hash::make('password'),
      'jabatan' => Str::random(1) == 0 ? 'kasir' : 'admin',
    ]);
  }
}
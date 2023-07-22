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

  }
}
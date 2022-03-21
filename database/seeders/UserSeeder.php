<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = DB::table('users')->insert([
          'name'=>'Admin',
          'email'=>'admin@admin.com',
          'password'=>'$2y$10$exWlrMoEVstT9apqrxzXcewdGu6wbWbDrkwdH2ur/SywmCjGXKkXW',
       ]);
    }
}

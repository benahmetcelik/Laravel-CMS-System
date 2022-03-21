<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_settings = DB::table('site_settings')->insert([
            'title'=>'Hello World',
            'logo_url'=>'MyLogoUrl',
            'default_lang_id'=>1,
            'email'=>'ben4hmetcelik@gmail.com'
        ]);
    }
}

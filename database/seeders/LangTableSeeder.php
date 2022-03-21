<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('languages')->insert([
                'lang_name' => 'Türkçe',
                'lang_short' => 'tr',
                'lang_flag' => 'lang_flag',
                'status' => 1
            ]);
        DB::table('languages')->insert([
            'lang_name' => 'English',
            'lang_short' => 'en',
            'lang_flag' => 'lang_flag',
            'status' => 1
        ]);

    }
}

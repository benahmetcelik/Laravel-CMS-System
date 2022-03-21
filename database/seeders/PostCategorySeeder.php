<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {
            $post_category = DB::table('post_categories')->insert([
                'post_id' => $i,
                'category_id' => 1,
            ]);
        }
    }
}

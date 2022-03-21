<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $title = permalink($faker->sentence);


        DB::table('categories')->insert([
            'title' =>  $faker->text($maxNbChars = 10),
            'img_url' => $faker->text($maxNbChars = 10),
            'slug' => $title,
            'status' => 1
        ]);
    }
}

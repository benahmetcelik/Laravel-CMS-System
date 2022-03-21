<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {

            $faker = Faker::create();
            $title = permalink($faker->sentence);



            DB::table('posts')->insert([
                'title' =>  $faker->text($maxNbChars = 10),
                'img_url' => $faker->text($maxNbChars = 10),
                'content' => $faker->text($maxNbChars = 200),
                'slug' => $title,
                'category_id' => 1,
                'status' => 1
            ]);

        }
    }
}

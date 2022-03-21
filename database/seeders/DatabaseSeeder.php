<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(LangTableSeeder::class);
        $this->call(PostCategorySeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(SiteSettingsSeeder::class);
        $this->call(UserSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}

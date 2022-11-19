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

        $this->call([
            UserSeeder::class,
            UserRelatedTableSeeder::class,
            WebsiteInfoSeeder::class,
            WebsiteInfoTitleSeeder::class,
            UserRelatedTableSeeder::class,
            BannerSeeder::class,
            BlogSeeder::class,
        ]);

    }
}

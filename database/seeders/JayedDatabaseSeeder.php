<?php

namespace Database\Seeders;

use App\Http\Controllers\WebsiteController;
use App\Models\WebsiteCourseCategory;
use Illuminate\Database\Seeder;

class JayedDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            WebsiteInfoSeeder::class,
            WebsiteInfoTitleSeeder::class,
            WebsiteCourseCategorySeeder::class,
        ]);

    }
}

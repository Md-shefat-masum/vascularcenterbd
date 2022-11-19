<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::truncate();

        $banners = [
            [
                'banner_title' => 'Looking for first class <br />',
                'banner_sub_title' => 'With over 10 years of experience helping to find<br />',
                'image' => 'uploads/banner/v2eudnmfvmH2F5xF5zt2cG6hhh53zgMe3QvutMd0.jpg',
                'slug' => uniqid().time(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'banner_title' => 'Looking for first class <br />',
                'banner_sub_title' => 'With over 10 years of experience helping to find<br />',
                'image' => 'uploads/banner/j0nWqjxHgpwQgekomXsmfmtckCvHDvB5Lg2XAKUe.jpg',
                'slug' => uniqid().time(),
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        Banner::insert($banners);
    }
}

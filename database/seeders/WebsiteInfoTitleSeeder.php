<?php

namespace Database\Seeders;

use App\Models\WebsiteInfoTitle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class WebsiteInfoTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteInfoTitle::truncate();
        $info_data = [
            "Office Address" => 'contact_information',
            "Mobile Number" => 'contact_information',
            "WhatsApp Number" => 'contact_information',
            "WhatsApp Link" => 'contact_information',
            "Telegram Number" => 'contact_information',
            "Telegram Link" => 'contact_information',
            "Email Address" => 'contact_information',
            "Office Map Link" => 'contact_information',
            "Office Map longitude" => 'contact_information',
            "Office Map latitude" => 'contact_information',
            "Facebook Group Link Subscribe" => "contact_information",
            "Telegram Group Link Subscribe" => "contact_information",
            "WhatsApp Group Link Subscribe" => "contact_information",
            "Website Link" => "contact_information",
            "Working Hour" => 'contact_information',
            "Facebook Page Link" => "social_information",
            "Twitter Channel Link" => "social_information",
            "Youtube Channel Link" => "social_information",
            "Instagram Page Link" => "social_information",
            "Linkedin Page Link" => "social_information",
            "Pinterest Page Link" => "social_information",
            "WhatsApp Channel Link" => "social_information",
            "Telegram Channel Link" => "social_information",
            "Seo Kewords" => 'seo_information',
            // "Home Image" => 'image_information',
            // "Speciality Image" => 'image_information',
            "Logo Image" => 'image_information',
            "About Information" => 'about_information',
            "About Information Image" => 'about_information_image',
        ];

        foreach ($info_data as $key => $val) {
            $info = new WebsiteInfoTitle();
            $info->title = $key;
            $info->type_name = $val;
            $info->creator = 1;
            $info->created_at = Carbon::now()->toDateTimeString();
            $info->save();
        }
    }
}

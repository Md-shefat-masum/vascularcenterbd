<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\WebsiteInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class WebsiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteInfo::truncate();
        $info_data = [
            "Office Address" => ['contact_information', "রক্তনালী বিশেষজ্ঞ এবং সার্জন। Vascular & Endovascular Surgeon. Ibn Sina Hospital, Dhanmondi, Road: 15/A, House: 68, Dhaka, Bangladesh"],
            "Logo Image" => ['image_information', "uploads/website/2022/05/image25-2022_05_28_13_13_46.png"],
            "Mobile Number" => ['contact_information', "01733677692"],
            "WhatsApp Number" => ['contact_information', "01733677692"],
            "Telegram Number" => ['contact_information', "01733677692"],
            "Email Address" => ['contact_information', 'ziasbmmu@gmail.com'],
            "Office Map Link" => ['contact_information', 'tinyurl.com/2ett697h'],
            "Office Map longitude" => ['contact_information', '23.8096849'],
            "Office Map latitude" => ['contact_information', '90.3615803'],
            "Facebook Group Link Subscribe" => ["contact_information", ' '],
            "Telegram Group Link Subscribe" => ["contact_information", ''],
            "WhatsApp Group Link Subscribe" => ["contact_information", ''],
            "Website Link" => ["contact_information", 'www.vascular.org'],
            "Working Hour" => ['contact_information', 'ibne sina: 5:00 pm - 8:00 pm'],
            "Facebook Page Link" => ["social_information", 'www.facebook.com/AKMZiaulHuque/'],
            "Twitter Channel Link" => ["social_information", 'http://www.twitter.com/dr_zia_bd'],
            "Youtube Channel Link" => ["social_information", ' '],
            "Instagram Page Link" => ["social_information", 'https://www.instagram.com/dr.zia.bd/'],
            "Linkedin Page Link" => ["social_information", ' '],
            "WhatsApp Channel Link" => ["social_information", 'wa.me/+8801733677692'],
            "Telegram Channel Link" => ["social_information", ' '],
            "Seo Kewords" => ['seo_information', 'Dr. AKM Ziaul Huque,রক্তনালী বিশেষজ্ঞ এবং সার্জন,Vascular & Endovascular Surgeon, Ibn Sina Hospital'],
            "Facebook Messenger Link" => ['contact_information', ' '],
            "Facebook Messenger Link" => ['contact_information', ' '],
            "About Information" => ['about_information','<h2 class="about_me_title" style="font-family: Poppins, sans-serif; font-weight: 800; line-height: 1.1; color: rgb(34, 34, 34); margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-size: 30px; padding: 0px;">ডাঃ একেএম জিয়াউল হক</h2><div class="text" style="color: rgb(34, 34, 34); font-family: Hind, sans-serif; font-size: 16px;"><p class="about_me_text" style="margin-right: 0px; margin-left: 0px; padding: 0px; font-size: 20px; color: rgb(132, 132, 132); line-height: 36px; text-align: justify;"><span style="font-weight: 700;">ডাঃ একেএম জিয়াউল হক</span>, রক্তনালীর রোগ বিশেষজ্ঞ এবং সার্জন (Vascular and Endovascular Surgeon)। তিনি রাজশাহী মেডিকেল কলেজ থেকে ২০০৪ সালে এমবিবিএস পাশ করেছেন। এরপর তিনি এক বছর গণস্বাস্থ্য সমাজভিত্তিক মেডিকেল কলেজ এ ফিজিওলজি বিভাগে প্রভাষক হিসেবে কাজ করেছেন। পরবর্তীতে তিনি ২০০৬ সালে ২৫তম বিসিএস এর মাধ্যমে সরকারী চাকুরীতে যোগদান করেন। ২০১৬ সালের জানুয়ারীতে তিনি বঙ্গবন্ধু শেখ মুজিব মেডিকেল বিশ্ববিদ্যালয় (বিএসএমএমইউ) হতে কার্ডিও-ভাসকুলার সার্জারীতে উচ্চতর ডিগ্রী মাস্টার অব সার্জারী (এমএস) ডিগ্রী অর্জন করেছেন। চিকিৎসা সংক্রান্ত বিষয়ে উন্নত প্রশিক্ষনের জন্য ভারত, সিঙ্গাপুর এবং তুরস্ক গমন করেছেন। বর্তমানে তিনি জাতীয় হৃদরোগ হাসপাতালের ভাসকুলার সার্জারী বিভাগে এবং ভাসকুলার কেয়ার সেন্টার, ইবনে সিনা হাসপাতাল এ কনসালটেন্ট, ভাসকুলার এবং এন্ডোভাসকুলার সার্জন হিসেবে কর্মরত আছেন।</p></div>'],
            "About Information Image" => ['about_information_image','uploads/about/g0AF7RC0qcRlViA2qjftEIbu36wGPmCY2lNytxod.jpg'],
        ];
        foreach ($info_data as $x => $val) {
            $info = new WebsiteInfo();
            $info->title = $x;
            $info->type_name = $val[0];
            $info->value = $val[1]??null;
            $info->creator = 1;
            $info->created_at = Carbon::now()->toDateTimeString();
            $info->status = 1;
            $info->save();
        }
    }
}

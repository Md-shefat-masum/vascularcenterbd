<?php

namespace Database\Seeders;

use App\Models\WebsiteBlogCategoryInfo;
use App\Models\WebsiteBlogInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteBlogInfo::truncate();
        WebsiteBlogCategoryInfo::truncate();

        $categories = [
            [
                'name' => 'হিমোফিলিয়া',
                'url' => '/হিমোফিলিয়া',
                'slug' => uniqid().time(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'রক্তনালীর বিভিন্ন রোগ',
                'url' => '/রক্তনালীর-বিভিন্ন-রোগ',
                'slug' => uniqid().time(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        WebsiteBlogCategoryInfo::insert($categories);

        $blogs = [
            [
                'url' => '/রক্তনালীর-বিভিন্ন-রোগ',
                'title' => 'রক্তনালীর বিভিন্ন রোগ',
                'image' => 'uploads/blog/blog_740x400_106291b2beb9bfa1653715646.jpg',
                'short_description' => 'এ রোগে পায়ের শিরাগুলো চামড়ার নিচে ফুলে উঠে এবং বাহির থেকে দেখতে আঁকাবাঁকা মনে হয়। প্রথম দিকে শুধু অস্বস্তি লাগলেও সঠিক সময়ে চিকিৎসা না করালে পরবর্তীতে নানা উপসর্গ দেখা দেয়।',
                'description' => '<p>বাংলাদেশে বিভিন্ন ধরনের রক্তনালীর রোগী আছে। দেশে রক্তনালীর প্রধান রোগ গুলো হল&nbsp;</p><p>১। ভ্যারিকোজ ভেইন বা আঁকাবাঁকা রক্তনালী (Varicose Vein)</p><p>এ রোগে পায়ের শিরাগুলো চামড়ার নিচে ফুলে উঠে এবং বাহির থেকে দেখতে আঁকাবাঁকা মনে হয়। প্রথম দিকে শুধু অস্বস্তি লাগলেও সঠিক সময়ে চিকিৎসা না করালে পরবর্তীতে নানা উপসর্গ দেখা দেয়।</p><p>২। ভাস্কুলার ম্যালফরমেশন বা রক্তনালীর গঠনগত অসামঞ্জস্যতা (Vascular Malformation)</p><p>৩। ডিপ ভেইন থ্রম্বোসিস বা ডিভিটি (Deep Vein Thrombosis)</p><p>মানুষের পা হঠাৎ ফুলে ব্যথা শুরু হয়, লাল হয়। মাংসের গভীরে শিরায় রক্ত জমাট বেঁধে এই রোগ হয় বলেই এর নাম ডিভিটি।</p><p>৪। ভেনাস আলসার ইত্যাদি ।</p><p>রক্তনালীর পরিক্ষা ডুপ্লেক্স স্ক্যান (Duplex Scan) বা রক্তনালীর আলট্রাসনোগ্রাফি</p><p>শরীরের ভেতরে রক্তনালীর অবস্থা বোঝার জন্য ক্লিনিক্যালী রোগীকে পরীক্ষার সাথে ডুপ্লেক্স স্ক্যান (Duplex Scan) বা আলট্রাসনোগ্রাফি করা হয় ।চিকিৎসায় এই সকল রোগ ভালো হয়।&nbsp;</p>',
                'category_id' => '3',
                'tag_name' => '["\u09b0\u0995\u09cd\u09a4\u09a8\u09be\u09b2\u09c0\u09b0 \u09ac\u09bf\u09ad\u09bf\u09a8\u09cd\u09a8 \u09b0\u09cb\u0997"]',
                'date' => '',
                'status' => 'active',
                'add_to_featured' => '2',
                'view' => rand(30,100),
                'seo_title' => 'বাংলাদেশে বিভিন্ন ধরনের রক্তনালীর রোগ',
                'seo_keywords' => 'বাংলাদেশে বিভিন্ন ধরনের রক্তনালীর রোগ',
                'seo_description' => 'বাংলাদেশে বিভিন্ন ধরনের রক্তনালীর রোগ',
                'search_keywords' => 'বাংলাদেশে বিভিন্ন ধরনের রক্তনালীর রোগ',
                'slug' => '/রক্তনালীর-বিভিন্ন-রোগ',
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'url' => '/শিরায়-রক্ত-জমাট',
                'title' => 'শিরায় রক্ত জমাট',
                'image' => 'uploads/blog/blog_740x400_106291b33de7a071653715773.jpg',
                'short_description' => 'ডিভিটি বা ডিপ ভেইন থ্রম্বোসিস আমাদের শিরার (রক্তনালী) একটি রোগ।  এই রোগে অনেক সময়  পা হঠাৎ করে ফুলে ব্যথা শুরু হয়, লাল হয়ে যেতে শুরু করে এবং ব্যথা করে।  বাড়তে বাড়তে অনেক সময় ব্যথা অসহনীয় পর্যায়ে চলে যায়।',
                'description' => '<p>শিরায় রক্ত জমাট বাঁধে যে রোগেঃ ডিভিটি বা ডিপ ভেইন থ্রম্বোসিস</p><p>ডিভিটি বা ডিপ ভেইন থ্রম্বোসিস আমাদের শিরার (রক্তনালী) একটি রোগ।&nbsp; এই রোগে অনেক সময়&nbsp; পা হঠাৎ করে ফুলে ব্যথা শুরু হয়, লাল হয়ে যেতে শুরু করে এবং ব্যথা করে।&nbsp; বাড়তে বাড়তে অনেক সময় ব্যথা অসহনীয় পর্যায়ে চলে যায়। এমন একটি রোগের নামই ডিভিটি বা ডিপ ভেইন থ্রম্বোসিস।&nbsp; যারা উড়োজাহাজে দীর্ঘ পথ পাড়ি দেন তাদের অনেকেরও এমনটি হতে পারে। ইকোনোমি ক্লাশের যাত্রীদের এ রোগটি বেশী হয় বলে একে ইকোনোমি ক্লাশ সিনড্রম ও বলা হয়।</p><p>আমাদের শরীরে দুই ধরনের শিরা আছে, একদল থাকে শরীরের উপরিভাগে অর্থ্যাত চামড়ার নীচে যা আমরা খালি চোখে দেখতে পারি ।&nbsp; আর একদল আছে যারা থাকে মাংশপেশীর গভীরে, যা বাইরে থেকে দেখা যায়না।&nbsp; এরাই বেশিরভাগ রক্ত প্রবাহ হৃদপিন্ডে নিয়ে আসে।&nbsp; এই গভীরের রক্তনালীগুলোতে রক্ত জমাট বেধে গেলেই ডিভিটি হয়।</p><p>ডিপ ভেইন থ্রম্বোসিস হলে সাথে সাথেই চিকিৎসা শুরু করা উচিত।&nbsp; চিকিৎসা শুরু করতে দেরি হলে এটা দীর্ঘস্থায়ী হতে পারে এবং পায়ে ঘা হয়ে যেতে পারে। বেশী দেরি করলে এমনকি পা কেটে ফেলা দেবার ও প্রয়োজন পরতে পারে। এখান থেকে জমাট রক্ত ছুটে ফুসফুসে গিয়ে মৃত্যু ঘটার নজির ও কম নয়।</p><p>ষাটোর্ধ বয়স, ক্যান্সার, মেদবহুল শরীর, গর্ভাবস্থা, জন্মনিয়ন্ত্রনের বড়ি খেয়ে চলা, কোমড়ের বা হাটুর বড় অপারেশন করানো, দীর্ঘ সময় পা না নাড়িয়ে বসে থাকা ইত্যাদি নানা কারনে ডিভিটি হতে পারে।&nbsp; রক্তনালীর পরীক্ষা (ডুপ্লেক্স স্ক্যান) পরীক্ষার মাধ্যমে এটির উপস্থিতি নিশ্চিত করা সম্ভব।</p><p>রক্তনালী বিশেষজ্ঞগন এই রোগের চিকিৎসায় রক্ত পাতলা করার জন্য রক্তনালীতে হেপারিন ইঞ্জেকশন দিয়ে থাকেন। এছাড়া রোগ পরবর্তী সময়ে ওয়ারফেরিন ট্যাবলেট ও অন্যন্য রক্ত পাতলাকারি অসুধ দিয়ে থাকেন। এই রোগীকে হাটা চলার সময় ক্রেপ ব্যান্ডেজ নামক এক ধরনের বিশেষ আবরনী পায়ে পরে থাকতে হয়। ঘুমানোর সময় ক্রেপ ব্যান্ডেজ খুলে শুতে হয় এবং পায়ের নীচে বালিশ দিয়ে পা সামান্য উচু করে শুতে হয়।</p><div><br></div>',
                'category_id' => 3,
                'tag_name' => '["\u09b0\u0995\u09cd\u09a4\u09a8\u09be\u09b2\u09c0\u09b0 \u09ac\u09bf\u09ad\u09bf\u09a8\u09cd\u09a8 \u09b0\u09cb\u0997"]',
                'date' => '',
                'status' => 'active',
                'add_to_featured' => '2',
                'view' => rand(30,100),
                'seo_title' => 'শিরায় রক্ত জমাট',
                'seo_keywords' => 'শিরায় রক্ত জমাট',
                'seo_description' => 'শিরায় রক্ত জমাট',
                'search_keywords' => 'শিরায় রক্ত জমাট',
                'slug' => '/শিরায়-রক্ত-জমাট',
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'url' => '/কিডনি-বিকল-রোগীর-লাইফলাইন',
                'title' => 'কিডনি বিকল রোগীর লাইফলাইন',
                'image' => 'uploads/blog/blog_740x400_106291b3ac61e2c1653715884.jpg',
                'short_description' => 'যখন শরীরে গহবর বিশিষ্ট দুটি অঙ্গের মধ্যে অস্বাভাবিক একটি পথ তৈরী হয় তাকে ফিস্টুলা বলে। ফিস্টুলা শরীরের অনেক অঙ্গেই হতে পারে, রক্তনালীর ধমনী (Artery) আর শিরার (Vein) মধ্যে যখন এই ফিস্টুলা তৈরী হয় তখন তাকে এভি ফিস্টুলা বা আর্টারিও ভেনাস ফিস্টুলা বলে',
                'description' => '<p>কিডনি বিকল রোগীর লাইফলাইনঃ আর্টারিও ভেনাস ফিস্টুলা</p><p>আর্টারিও ভেনাস ফিস্টুলা কি&nbsp;</p><p>যখন শরীরে গহবর বিশিষ্ট দুটি অঙ্গের মধ্যে অস্বাভাবিক একটি পথ তৈরী হয় তাকে ফিস্টুলা বলে। ফিস্টুলা শরীরের অনেক অঙ্গেই হতে পারে, রক্তনালীর ধমনী (Artery) আর শিরার (Vein) মধ্যে যখন এই ফিস্টুলা তৈরী হয় তখন তাকে এভি ফিস্টুলা বা আর্টারিও ভেনাস ফিস্টুলা বলে। এভি ফিস্টুলা জন্মগত একটি রোগ তবে আঘাত পেলেও কখনো কখনো এমনটি হবার সম্ভাবনা থাকে। আবার জটিল কিডনি রোগে ডায়ালাইসিস করার জন্য ইচ্ছাকৃত ভাবেই এই ফিস্টুলা বানিয়ে নেয়া হয়।</p><p>ধমনী গুলো উচ্চ অক্সিজেন যুক্ত রক্ত বহন করে শরীরের বিভিন্ন অংশে পৌছে দেয় আর শিরা গুলো উচ্চ কার্বন ডাই অক্সাইড যুক্ত রক্ত শরীরের বিভিন্ন অংশ থেকে সংগ্রহ করে হৃদপিন্ডে নিয়ে যায়। যার ফলে এদের মধ্যে যখন ফিস্টুলা তৈরী হয় তখন এই ভারসাম্যটা নষ্ট হতে পারে এবং তাতে হার্ট এর কাজ অনেক বেড়ে যায়। তাই এভি ফিস্টুলা হলে তার চিকিৎসা করাতে হয়। বিশেষজ্ঞ ভাসকুলার সার্জনগন অপারেশনের মাধ্যমে এই ফিস্টুলা টি বন্ধ করে দিতে পারেন।</p><p>আবার&nbsp; জটিল&nbsp; কিডনি রোগ&nbsp; বা&nbsp; কিডনি বিকল হলে হেমোডায়ালাইসিস&nbsp; (Hemodialysis) করার জন্য অপারেশন&nbsp; করে&nbsp; কৃত্রিম ভাবে&nbsp; রোগীর&nbsp; হাতের&nbsp; কব্জির&nbsp; কাছে&nbsp; একটি এভি ফিস্টুলা তৈরী করে&nbsp; দেয়া&nbsp; হয়। ফিস্টুলা তৈরীর&nbsp; চার&nbsp; থেকে&nbsp; ছয়&nbsp; সপ্তাহ&nbsp; পরে এটি ম্যাচিউর হয় এবং&nbsp; এটা&nbsp; দিয়ে হেমোডায়ালাইসিস করা যায়।</p><p>বার বার ডায়ালাইসিস করায় এটি নষ্ট হয়ে গেলে&nbsp; হাতের&nbsp; আরো&nbsp; উপরের&nbsp; দিকে&nbsp; নতুন&nbsp; করে একটি ফিস্টুলা তৈরী করে দিতে হয় এবং পুরোনো&nbsp; ফিস্টুলাটি&nbsp; বন্ধ&nbsp; করে&nbsp; দিতে হয়।</p><div><br></div>',
                'category_id' => 3,
                'tag_name' => '["\u09b0\u0995\u09cd\u09a4\u09a8\u09be\u09b2\u09c0\u09b0 \u09ac\u09bf\u09ad\u09bf\u09a8\u09cd\u09a8 \u09b0\u09cb\u0997"]',
                'date' => '',
                'status' => 'active',
                'add_to_featured' => '2',
                'view' => rand(30,100),
                'seo_title' => 'কিডনি বিকল রোগীর লাইফলাইন',
                'seo_keywords' => 'কিডনি বিকল রোগীর লাইফলাইন',
                'seo_description' => 'কিডনি বিকল রোগীর লাইফলাইন',
                'search_keywords' => 'কিডনি বিকল রোগীর লাইফলাইন',
                'slug' => '/কিডনি-বিকল-রোগীর-লাইফলাইন',
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'url' => '/হিমোফিলিয়া-বা-রক্ত-জমাট-না-বাঁধা',
                'title' => 'হিমোফিলিয়া বা রক্ত জমাট না বাঁধা',
                'image' => 'uploads/blog/blog_740x400_106291b40d72dd71653715981.jpg',
                'short_description' => 'হিমোফিলিয়া একটি বংশানুক্রমিক রক্তের রোগ। এটি রক্তের জমাট বাঁধার ক্ষমতা নষ্ট করে দেয়।  সাধারণত শরীরের কোথাও কেটে গেলে বা আঘাতপ্রাপ্ত স্থান থেকে রক্ত বের হলে কয়েকটি প্রক্রিয়ার মাধ্যমে পাঁচ থেকে আট মিনিটের মধ্যে রক্ত জমাট বাঁধে',
                'description' => '<p>রোগের নাম হিমোফিলিয়া বা রক্ত জমাট না বাঁধা</p><p>হিমোফিলিয়া একটি বংশানুক্রমিক রক্তের রোগ। এটি রক্তের জমাট বাঁধার ক্ষমতা নষ্ট করে দেয়।&nbsp; সাধারণত শরীরের কোথাও কেটে গেলে বা আঘাতপ্রাপ্ত স্থান থেকে রক্ত বের হলে কয়েকটি প্রক্রিয়ার মাধ্যমে পাঁচ থেকে আট মিনিটের মধ্যে রক্ত জমাট বাঁধে। রক্ত জমাট বাঁধার জন্য অণুচক্রিকা ছাড়াও ১৩টি উপাদান প্রয়োজন। এই উপাদানগুলোকে ‘ফ্যাক্টর’ বলে। এদের মধ্যে আট ও নয় নম্বর ফ্যাক্টরে ঘাটতি দেখা দিলে রক্তের জমাট বাধায় সমস্যা দেখা দেয়। ঘাটতির মাত্রা অনুযায়ী প্রকাশ পায় রোগের তীব্রতা। এই ফ্যাক্টর গুলো যদি ৩০ শতাংশের নিচে নেমে যায় তাহলে রক্ত জমাট বাধার সমস্যা দেখা দিতে শুরু করে। এমনকি এক পর্যায়ে শরীরের অভ্যন্তরে নিজে নিজেই রক্ত ক্ষরণ হতে শুরু করে।</p><p>দু’ধরণের হিমোফিলিয়া আছ। হিমোফিলিয়া-এ ও হিমোফিলিয়া-বি। ফ্যাক্টর আট-এর অভাব হলে তাকে হিমোফিলিয়া এ বলে। ফ্যাক্টর নয় এর অভাব হলে তার নাম হিমোফিলিয়া বি। ‘হিমেফিলিয়া বি’ কে ক্রিসমাস ডিজিজও বলা হয়। পৃথিবীতে যত হিমোফিলিয়া রোগী আছ তার ৮৫ শতাংশই হিমোফিলিয়া এ-এর রোগী।</p><p>#এ রোগে কেন হয়?</p><p>হিমোফিলিয়া ঘুমন্ত এক ধরণের জেনেটিক রোগ। শরীর এক্স- ক্রোমজমের বিশেষ একটি জিনের মিউটেশন থেকে এই রোগের সূত্রপাত হয়। মূলত: মেয়েরা এর বাহক। আর পুরুষরা এর শিকার। কারণ মেয়েদের শরীর থাকে দু’টি এক্স-ক্রোমজম আর পুরুষের একটি। তবে ক্ষেত্র বিশেষে মেয়েরাও এর শিকার হতে পারে।</p><p>আমাদের দেহের কোষে মোট ২৩ জোড়া ক্রোমোজম থাকে। এর মধ্যে এক জোড়া ক্রোমোজম লিঙ্গ নির্ধারণ করে। মেয়েদের কোষে থাকে এক্স এক্স এবং ছেলেদের কোষে এক্স ওয়াই ক্রোমোজম। হিমোফিলিয়া জিন থাকে এই এক্স ক্রোমোজমের মধ্যে। এক্স ক্রোমোজম হচ্ছে হিমোফিলিয়া রোগের বাহন। যেহেতু মেয়েরা দুটো এক্স ক্রোমোজমের অধিকারী, তাই একটা রোগাক্রান্ত হলে অন্য এক্স ক্রোমোজম ভালো থাকে বলে সহজে মেয়েরা এ রোগে ভোগে না। ছেলেদের বেলায় একটা এক্স ক্রোমোজম থাকে। সেটা যদি হিমোফিলিয়া রোগ বহনকারী হয়, তাহলে ছেলেদের এ রোগ থেকে মুক্তি নেই। হিমোফিলিয়ার জিন বহনকারী নারীদের সাধারণত ‘ক্যারিয়ার’ বা বাহক বলা হয়।</p><p>#রোগের লক্ষণঃ</p><p>মূলত: রক্ত ক্ষরণই এর প্রধান লক্ষণ। অধিকাংশ রোগীরাই কোন অপারেশনের পর বা দূর্ঘটনাজনিত আঘাতের পর যখন আর রক্তক্ষরণ বন্ধ হয় না তখনই রোগটি সম্পর্কে প্রথম জানতে পারে। শিশুদের খাতনা করার পর অনেক শিশুদের রক্ত ক্ষরণ বন্ধ হতে সময় বেশী লাগে। তখনও এই রোগের চিন্তা মাথায় আসে। রোগের মাত্রা অনুযায়ী প্রকাশ পায় আরো কিছু লক্ষণ। ফ্যাক্টর দু’টির ঘাটতি বেশি হলে নিজে নিজেই বা সামান্য আঘাতে রক্ত ক্ষরণ হতে পারে হাঁটুতে, কনুইয়ে। এমনকি গভীর মাংসেও। এর থেকে অস্থি সন্দির কর্মক্ষমতাও নষ্ট হতে পারে।</p><p>এছাড়াও শরীরের অন্যান্য অংশেও রক্ত ক্ষরণ হতে পারে। বিশেষ করে মস্তিষ্কে, গলার ভিতরে, গলায় রক্তক্ষরণ হওয়া সবচেয়ে মারাত্মক। এতে সঠিক সময়ে সঠিক চিকিত্সা ব্যবস্থা না নিলে হিমোফিলিয়া রোগীর মৃত্যু পর্যন্ত হতে পারে। তাই সময় থাকতেই রোগটি সম্পর্কে নিশ্চিত হয়ে যাওয়া ভাল। অন্তত: সাবধান থাকলে মৃত্যুর ঝুঁকিটা কমানো যায়।</p><p>#কী ধরনের এবং কোথায় বেশি রক্তক্ষরণ হয়ঃ</p><p>ক্ষতস্থান থেকে রক্ত পড়া সহজে বন্ধ না হওয়া সব হিমোফিলিয়া রোগীর বৈশিষ্ট্য। ক্ষতস্থান থেকে অল্প অল্প রক্ত চলবে কয়েক দিন থেকে সপ্তাহব্যাপী। শরীরের যেকোনো জায়গা থেকে হঠাৎ রক্ত পড়া শুরু হতে পারে, মুখের ভেতর দাঁতের কামড় লেগে অথবা ত্বকের নিচে দেখা গেল নীল জখম হয়ে গেছে একটু আঘাতেই। ক্ষত যদি বেশি হয় তাহলে জায়গাটা ফুলে উঠবে, ব্যথা হবে, এমনকি জ্বরও হতে পারে। অনেকের আবার দাঁত তুলতে গিয়েই ধরা পড়ে রোগটা। দাঁত তোলার পর রক্ত পড়া সহজে বন্ধ হয় না। সবচেয়ে মারাত্মক হয় মাথায় আর অস্থিসন্ধিতে রক্তক্ষরণ হলে। অস্থিসন্ধিতে, বিশেষ করে হাঁটুতে রক্তক্ষরণ হলে হাঁটু ফুলে উঠবে, ব্যথা হবে, রোগী হাঁটতে পারবে না। এ অবস্থায় চিকিৎসকের ব্যবস্থাপত্র অনুযায়ী চিকিৎসা না করালে সারা জীবনের জন্য পঙ্গু হওয়ার ঝুঁকি থাকে।</p><p>শিশুদের ক্ষেত্রে গোড়ালির অস্থিসন্ধি বেশি আক্রান্ত হয়। অনেক সময় বড়দের বেলায় প্রস্রাবের সঙ্গেও রক্ত পড়তে পারে। অতিরিক্ত রক্তক্ষরণের ফলে রোগী রক্তস্বল্পতা ও আর্থ্রাইটিসে ভোগে। শরীরের অতি প্রয়োজনীয় অঙ্গের ওপর-যেমন মস্তিষ্ক, হৃৎপিণ্ড, ফুসফুস ইত্যাদির ওপর অনেক সময় জমাট রক্তের চাপ পড়লে স্মায়বিক দুর্বলতা হতে পারে। মোট কথা, শরীরে যেকোনো জায়গায় রক্তক্ষরণের ফলে বিভিন্ন ধরনের যেসব উপসর্গ হতে পারে, তা রক্তের পরিমাণের ওপর নির্ভর করে।</p><p>#কিভাবে জানা যায়?</p><p>রক্তের ফ্যাক্টর দু’টির পরীক্ষা (ফ্যাক্টর অ্যাসে) রক্তের জমাট বাধার ক্ষমতা পরীক্ষা (বিটি, সিটি, পিটি, এপিটিটি) করলে রোগটি ধরা পড়ে। গর্ভাবস্থায় ভ্রুণের ডিএনএ পরীক্ষা করে গর্ভস্থ শিশুর রোগ সম্পর্কে জেনে নেওয়ার ব্যবস্থা আছে। তবে বাংলাদেশের ক্ষেত্রে এই ব্যবস্থা এখনো দুরের স্বপ্ন।</p><p>#চিকিৎসা:</p><p>রোগটি শিশু বয়সে নির্ণয় করা না গেলে কখনো চিকিৎসার অভাবে আবার কখনো বা ভুল চিকিৎসার কারণে অকালে মৃত্যুর ঝুঁকি তৈরি হতে পারে। আজ পর্যন্ত এ রোগের স্থায়ী কোনো চিকিৎসা আবিষ্কৃার হয়নি। তবে যে ফ্যাক্টরগুলোর স্বল্পতা ও অনুপস্থিতির কারণে রক্তক্ষরণ হয় সেগুলো শিরা পথে ইনজেকশন- এর মাধ্যমে শরীরে প্রবেশ করানোই উত্তম চিকিত্সা। এই ফ্যাক্টর এর দাম অনেক বেশী প্রায় ৩৫০০ থেকে ৮৫০০ টাকা পর্যন্ত। অনেক ক্ষেত্রে সবধরনের ফ্যাক্টর বাংলাদেশে পাওয়াও যায় না। কোন কোন ক্ষেত্রে কজুলেশন ফ্যাক্টর এর বিপরীতে ইনহিবিটর তৈরী হয়।</p><p>সে ক্ষেত্রে বেশী বেশী ফ্যাক্টর এর দরকার পড়ে অথবা বিবলতা ওষুধের মাধ্যমে চিকিত্সা করতে হয়। যা কিনা বাংলাদেশে পাওয়া যায় না। নিয়মিত রক্তরোগ বিশেষজ্ঞের তত্ত্বাবধানে থেকে মাসে মাসেই এর মাত্রা বুঝে নিয়ে সাবধানতা অবলম্বন করে ভালো থাকা সম্ভব।</p><p>বিশ্বজুড়ে হিমোফিলিয়া সারা পৃথিবীতে প্রতি ১০,০০০ জনে একজন হিমোফিলিয়াসহ অন্যান্য&nbsp; রক্তক্ষরণ রোগে ভুগছে। সনাক্ত করা সম্ভব হয়নি এমন রোগীর সংখ্যা আরো বেশী। সনাক্তকৃত রোগীদের ৭৫ শতাংশই কোন চিকিত্সার আওতায় আসতে পারে না অর্থাত্ এরা সুচিকিত্সা থেকে বষ্ণিত। চিকিত্সায় রক্ত পরিসঞ্চালক করতে হয় বলে অনেক রোগী মারা যায় রক্ত বাহিত রোগ (যেমন হেপাটাইটিস, এইডস ইত্যাদি) ও পরিসঞ্চালন জনিত জটিলতায়।</p><div><br></div>',
                'category_id' => 3,
                'tag_name' => '["\u09b0\u0995\u09cd\u09a4\u09a8\u09be\u09b2\u09c0\u09b0 \u09ac\u09bf\u09ad\u09bf\u09a8\u09cd\u09a8 \u09b0\u09cb\u0997"]',
                'date' => '',
                'status' => 'active',
                'add_to_featured' => '2',
                'view' => rand(30,100),
                'seo_title' => 'হিমোফিলিয়া বা রক্ত জমাট না বাঁধা',
                'seo_keywords' => 'হিমোফিলিয়া বা রক্ত জমাট না বাঁধা',
                'seo_description' => 'হিমোফিলিয়া বা রক্ত জমাট না বাঁধা',
                'search_keywords' => 'হিমোফিলিয়া বা রক্ত জমাট না বাঁধা',
                'slug' => '/হিমোফিলিয়া-বা-রক্ত-জমাট-না-বাঁধা',
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        WebsiteBlogInfo::insert($blogs);
    }
}
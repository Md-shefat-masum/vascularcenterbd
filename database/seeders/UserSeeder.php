<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        // $users = Http::get(env('SEED_URL').'/data/users')->json();
        $users = false;
        $default = false;

        if ($users) {
            foreach ($users as $item) {
                User::create($item);
                // $item = (object) $item;
                // $user = new User();
                // $user->role_id = $item->role_id;
                // $user->first_name = $item->first_name;
                // $user->last_name = $item->last_name;
                // $user->username = $item->username;
                // $user->photo = $item->photo;
                // $user->phone = $item->phone;
                // $user->email = $item->email;
                // $user->password = $item->password;
                // $user->slug = $item->slug;
                // $user->created_at = $item->created_at;
                // $user->save();
            }
        } else {
            $default = true;
        }
        // dd($users);

        // $user = new User();
        // $user->role_id = 5;
        // $user->first_name = 'Mr. student1';
        // $user->last_name = 'student1';
        // $user->username = 'student';
        // $user->photo = 'avatar.png';
        // $user->phone = '+880 123654789';
        // $user->email = 'student1@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->slug = 'student1';
        // $user->created_at = Carbon::now()->toDateTimeString();
        // $user->save();

        // $user = new User();
        // $user->role_id = 5;
        // $user->first_name = 'Mr. student1';
        // $user->last_name = 'student2';
        // $user->username = 'student';
        // $user->photo = 'avatar.png';
        // $user->phone = '+880 123654789';
        // $user->email = 'student2@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->slug = 'student2';
        // $user->created_at = Carbon::now()->toDateTimeString();
        // $user->save();

        if ($default) {
            $user = new User();
            $user->role_id = 1;
            $user->first_name = 'Mr.Super';
            $user->last_name = 'Admin';
            $user->username = 'super_admin';
            $user->photo = 'avatar.png';
            $user->phone = '+880 123654789';
            $user->email = 'superadmin@gmail.com';
            $user->password = Hash::make('12345678');
            $user->slug = 'super_admin';
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->save();

            $user = new User();
            $user->role_id = 2;
            $user->first_name = 'Mr. test';
            $user->last_name = 'Admin';
            $user->username = 'admin';
            $user->photo = 'avatar.png';
            $user->phone = '+880 123654789';
            $user->email = 'admin@gmail.com';
            $user->password = Hash::make('12345678');
            $user->slug = 'admin';
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->save();

            $user = new User();
            $user->role_id = 3;
            $user->first_name = 'Mr. test';
            $user->last_name = 'modarator';
            $user->username = 'modarator';
            $user->photo = 'avatar.png';
            $user->phone = '+880 123654789';
            $user->email = 'modarator@gmail.com';
            $user->password = Hash::make('12345678');
            $user->slug = 'modarator';
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->save();

            $user = new User();
            $user->role_id = 4;
            $user->first_name = 'Mr. test';
            $user->last_name = 'instructor';
            $user->username = 'instructor';
            $user->photo = 'avatar.png';
            $user->phone = '+880 123654789';
            $user->email = 'instructor@gmail.com';
            $user->password = Hash::make('12345678');
            $user->slug = 'user';
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->save();

            $user = new User();
            $user->role_id = 5;
            $user->first_name = 'Mr. test';
            $user->last_name = 'student';
            $user->username = 'student';
            $user->photo = 'avatar.png';
            $user->phone = '+880 123654789';
            $user->email = 'student@gmail.com';
            $user->password = Hash::make('12345678');
            $user->slug = 'student';
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->save();

            $user = new User();
            $user->role_id = 6;
            $user->first_name = 'Mr. editor';
            $user->last_name = 'editor';
            $user->username = 'editor';
            $user->photo = 'avatar.png';
            $user->phone = '+880 123654789';
            $user->email = 'editor@gmail.com';
            $user->password = Hash::make('@12345678');
            $user->slug = 'editor';
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->save();
        }
    }
}

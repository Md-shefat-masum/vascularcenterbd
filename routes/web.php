<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', 'WebsiteController@index')->name('website_index');
Route::get('/about', 'WebsiteController@about')->name('website_about');
Route::get('/chember', 'WebsiteController@chember')->name('website_chember');
Route::get('/services', 'WebsiteController@service')->name('website_service');
Route::get('/contact', 'WebsiteController@contact')->name('website_contact');
Route::post('/appointment-store', 'WebsiteController@appointment_store')->name('website_appointment_store');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', 'Admin\AdminController@index')->name('dashboard_index');

});

Route::get('/appoinment/all', 'Admin\AppoinmentController@all');
Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth'],
    'namespace' => 'Admin'
], function () {
    Route::resource('banner', 'BannerController');
    Route::get('/banner-delete/{banner}','BannerController@destroy')->name('banner.destroy');

    Route::resource('chember', 'ChemberController');
    Route::get('/chember-delete/{chember}','ChemberController@destroy')->name('chember.destroy');

    Route::resource('service', 'ServiceController');
    Route::get('/service-delelete/{service}','ServiceController@destroy')->name('service.destroy');

    Route::resource('video', 'VideoController');
    Route::get('/video-delete/{service}','VideoController@destroy')->name('video.destroy');

    Route::resource('team', 'TeamController');
    Route::get('/team-delete/{service}','TeamController@destroy')->name('team.destroy');

    Route::resource('message', 'ContactMessageController');
    Route::get('/message-delete/{message}','ContactMessageController@destroy')->name('message.destroy');

    Route::resource('appoinment_topic', 'AppoinmentTopicController');
    Route::get('/appoinment_topic-delete/{appoinment_topic}','AppoinmentTopicController@destroy')->name('appoinment_topic.destroy');

    Route::get('appoinment/all', 'AppoinmentController@all');
    Route::resource('appoinment', 'AppoinmentController');
    Route::get('/appoinment-delete/{appoinment}','AppoinmentController@destroy')->name('appoinment.destroy');

    Route::resource('subscriber', 'SubscriberController');
    Route::get('/subscriber-delete/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');

});


Route::get('/test_d',function(){
    // \Illuminate\Support\Facades\Storage::makeDirectory('test_directory');
    // dd(\App\Models\User::find(auth()->user()->id)->token());
    // dd(auth()->user()->createToken('accessToken'));
    // $user = App\Models\User::get();
    // return view('test',compact('user'));
    // dd(\Illuminate\Support\Facades\Hash::make('@dmin#123'));
});

Route::get('/test_d/{id}',function($id){
    $user = App\Models\User::find($id);
    return view('test.demo_data',compact('user'));
});


Route::group(['prefix' => 'profile', 'middleware' => ['auth'], 'namespace' => 'Admin\Course'], function () {
    Route::post('/update_profile', 'StudenProfileController@update_profile')->name('student_update_profile');
});

Route::get('/data/{table_name}', function ($table_name) {
    return DB::table($table_name)->get();
});

Route::get('/local-data-seed', function () {
    \Illuminate\Support\Facades\Artisan::call('db:seed LocalDataSeeder');
    // return redirect('/');
});

Route::get('/server-data-seed', function () {
    \Illuminate\Support\Facades\Artisan::call('db:seed ServerDataSeeder');
    // return redirect('/');
});

Route::get('/jayed-vai-seed', function () {
    \Illuminate\Support\Facades\Artisan::call('db:seed JayedDatabaseSeeder');
    // \Illuminate\Support\Facades\Artisan::call('db:seed CourseContentDaycareSeeder');
    return redirect('/');
});

Route::get('/module-seed', function () {
    \Illuminate\Support\Facades\Artisan::call('db:seed CourseRelatedSeeder');
    \Illuminate\Support\Facades\Artisan::call('db:seed CourseContentSeeder');
    \Illuminate\Support\Facades\Artisan::call('db:seed CourseContentSeederBatch1');
    \Illuminate\Support\Facades\Artisan::call('db:seed CourseContentSeederBatch3');
    // \Illuminate\Support\Facades\Artisan::call('db:seed CourseContentDaycareSeeder');
    return redirect('/');
});

// Route::get('/data-reload', function () {
//     \Illuminate\Support\Facades\Artisan::call('migrate:refresh', ['--seed' => true]);
//     \Illuminate\Support\Facades\Artisan::call('migrate', ['--path' => 'vendor/laravel/passport/database/migrations', '--force' => true]);
//     \Illuminate\Support\Facades\Artisan::call('passport:install');
//     return redirect()->back();
// });
Route::get('/tests',function(){
    auth()->logout();
    return view('test');
    dd(\Illuminate\Support\Facades\Hash::make('@min#123'));
});

Route::get('/course_info', 'WebsiteController@course_info');
include_once('fontend.php');

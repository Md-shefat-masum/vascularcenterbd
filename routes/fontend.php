<?php

use App\Http\Controllers\Frontend\Management\CourseInformationController;
use Illuminate\Support\Facades\Route;
// Route::get("/login_check","Frontend\FrontendController@login")->name('login');
Route::get('/','Frontend\FrontendController@index')->name('frontend_home');
Route::post('/subscribe-email','Frontend\FrontendController@postSubscribe')->name('post_subscribe');
Route::get('/course/{slug}','Frontend\FrontendController@course')->name('frontend_course');
Route::post('/next-batch-save','Frontend\FrontendController@next_batch_save')->name('frontend_next_batch_submit');
Route::post('/store-course-comment','Frontend\FrontendController@store_course_comment')->name('store_course_comment')->middleware('auth');
Route::get('/course-admit-page/{slug}','Frontend\FrontendController@course_admit_page')->name('course_admit_page')->middleware('auth');
Route::post('/course-admit-form','Frontend\FrontendController@course_admit_form')->name('course_admit_form')->middleware('auth');
Route::get('/course-admit-invoice','Frontend\FrontendController@course_admit_invoice')->name('course_admit_invoice')->middleware('auth');
Route::get('/all-course','Frontend\FrontendController@all_course')->name('frontend_all_course');
// Route::get('/contact','Frontend\FrontendController@contact')->name('frontend_contact');
Route::post('/any-question','Frontend\FrontendController@any_question')->name('any_question');
Route::get('/about','Frontend\FrontendController@about')->name('frontend_about');
Route::get('/blog','Frontend\FrontendController@blog')->name('frontend_blog');
Route::get('/blog/{slug}','Frontend\FrontendController@item_blog_page')->name('frontend_item_blog_page');
Route::post('/store-blog-comment','Frontend\FrontendController@store_blog_comment')->name('store_blog_comment')->middleware('auth');
Route::get('/login','Frontend\FrontendController@login')->name('login');
Route::get('/register','Frontend\FrontendController@register')->name('register');
Route::get('/password/reset','Frontend\FrontendController@reset')->name('reset');
Route::get('/password/email','Frontend\FrontendController@email')->name('email');

Route::get('/seminar','Frontend\FrontendController@seminar')->name('frontend_seminar');
Route::post('/seminar-save','Frontend\FrontendController@seminar_save')->name('frontend_seminar_submit');
Route::post('/post-user-adress-save','editor\Course\UserController@postUserAddress')->name('dashboard_user_address');
Route::post('/post-user-education-save','editor\Course\UserController@postUserEducation')->name('dashboard_user_education');
Route::post('/post-user-job-save','editor\Course\UserController@postUserJob')->name('dashboard_user_job');
Route::post('/post-user-link-save','editor\Course\UserController@postUserLink')->name('dashboard_user_link');
Route::post('/post-user-job-experience-save','editor\Course\UserController@postUserJobExperience')->name('dashboard_user_job_experience');
Route::post('/post-user-skill-set-save','editor\Course\UserController@postUserSkillSet')->name('dashboard_user_link_skill_set');
Route::get('/post-user-job-experience-delete/{id}','editor\Course\UserController@postUserJobExperienceDelete')->name('dashboard_user_job_experience_delete');
Route::get('/post-user-skill-set-delete/{id}','editor\Course\UserController@postUserSkillSetDelete')->name('dashboard_user_skill_set_delete');

Route::group( ['prefix'=>'editor','middleware'=>['auth'], 'namespace' => 'Frontend' ],function(){
    Route::get('/','EditorController@index')->name('editor_index');

    Route::group( ['prefix'=>'/course-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','CourseInformationController@index')->name('editor_course_information_index');
        Route::get('/all-course-registration','CourseInformationController@all_course_registration')->name('editor_all_course_registration_information');
        Route::get('/course-registration','CourseInformationController@course_registration')->name('editor_course_registration_information');
        Route::get('/course-registration-delete/{id}','CourseInformationController@course_registration_delete')->name('editor_course_registration_delete_information');
        Route::get('/all-course-comment','CourseInformationController@all_course_comment')->name('editor_all_course_comment_information');
        Route::get('/course-comment','CourseInformationController@course_comment')->name('editor_course_comment_information');
        Route::get('/course-comment-delete/{id}','CourseInformationController@course_comment_delete')->name('editor_course_comment_delete_information');
        Route::get('/course-comment-update','CourseInformationController@course_comment_update')->name('editor_course_comment_update_information');
        Route::get('/create-course-page','CourseInformationController@create_course_page')->name('editor_create_course_page_information');
        Route::get('/update-course-page/{id}','CourseInformationController@update_course_page')->name('editor_update_course_page_information');
        Route::get('/view-course-page/{id}','CourseInformationController@view_course_page')->name('editor_view_course_page_information');
        Route::get('/update-course-content/{id}','CourseInformationController@update_course_content')->name('editor_update_course_content_information');
        Route::get('/update-course-feature/{id}','CourseInformationController@update_course_feature')->name('editor_update_course_feature_information');
        Route::get('/update-course-requirement/{id}','CourseInformationController@update_course_requirement')->name('editor_update_course_requirement_information');
        Route::post('/store','CourseInformationController@store')->name('editor_course_information_store');
        Route::get('/get/{id}','CourseInformationController@get')->name('editor_course_information_get');
        Route::post('/update','CourseInformationController@update')->name('editor_course_information_update');
        Route::get('/delete/{id}','CourseInformationController@delete')->name('editor_course_information_delete');

        Route::get('/all-course-instructor','CourseInformationController@all_course_instructor')->name('editor_all_course_instructor_information');
        Route::get('/create-course-instructor','CourseInformationController@create_course_instructor')->name('editor_create_course_instructor_information');
        Route::get('/update-course-instructor/{id}','CourseInformationController@update_course_instructor')->name('editor_update_course_instructor_information');
        Route::get('/view-course-instructor/{id}','CourseInformationController@view_course_instructor')->name('editor_view_course_instructor_information');
        Route::post('/store-instructor','CourseInformationController@store_instructor')->name('editor_course_information_store_instructor');
        Route::get('/get-instructor/{id}','CourseInformationController@get_instructor')->name('editor_course_information_get_instructor');
        Route::post('/update-instructor','CourseInformationController@update_instructor')->name('editor_course_information_update_instructor');
        Route::get('/delete-instructor/{id}','CourseInformationController@delete_instructor')->name('editor_course_information_delete_instructor');

        Route::get('/all-category','CourseInformationController@all_category')->name('editor_all_category_information');
        Route::post('/store-category','CourseInformationController@store_category')->name('editor_store_category_information');
        Route::get('/get-category/{id}','CourseInformationController@get_category')->name('editor_get_category_information_get');
        Route::post('/update-category','CourseInformationController@update_category')->name('editor_update_category_information_update');
        Route::get('/delete-category/{id}','CourseInformationController@delete_category')->name('editor_delete_category_information_delete');

        Route::post('/store-course-other','CourseInformationController@store_course_other')->name('editor_store_course_other_information');
        Route::get('/get-course-other/{id}','CourseInformationController@get_course_other')->name('editor_get_course_other_information_get');
        Route::post('/update-course-other','CourseInformationController@update_course_other')->name('editor_update_course_other_information_update');
        Route::get('/delete-course-other/{id}/{type}/{course_id}','CourseInformationController@delete_course_other')->name('editor_delete_course_other_information_delete');
    });

    Route::group( ['prefix'=>'/contact-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','ContactInformationController@index')->name('editor_contact_information_index');
        Route::post('/store','ContactInformationController@store')->name('editor_contact_information_store');
        Route::get('/get/{id}','ContactInformationController@get')->name('editor_contact_information_get');
        Route::post('/update','ContactInformationController@update')->name('editor_contact_information_update');
        Route::get('/delete/{id}','ContactInformationController@delete')->name('editor_contact_information_delete');
    });

    Route::group( ['prefix'=>'/social-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','SocialLinksController@index')->name('editor_social_information_index');
        Route::post('/store','SocialLinksController@store')->name('editor_social_information_store');
        Route::get('/get/{id}','SocialLinksController@get')->name('editor_social_information_get');
        Route::post('/update','SocialLinksController@update')->name('editor_social_information_update');
        Route::get('/delete/{id}','SocialLinksController@delete')->name('editor_social_information_delete');
    });

    Route::group( ['prefix'=>'/seo-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','SeoInformationController@index')->name('editor_seo_information_index');
        Route::post('/store','SeoInformationController@store')->name('editor_seo_information_store');
        Route::get('/get/{id}','SeoInformationController@get')->name('editor_seo_information_get');
        Route::post('/update','SeoInformationController@update')->name('editor_seo_information_update');
        Route::get('/delete/{id}','SeoInformationController@delete')->name('editor_seo_information_delete');
    });

    Route::group( ['prefix'=>'/speciality-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','SpecialityInformationController@index')->name('editor_speciality_information_index');
        Route::post('/store','SpecialityInformationController@store')->name('editor_speciality_information_store');
        Route::get('/get/{id}','SpecialityInformationController@get')->name('editor_speciality_information_get');
        Route::post('/update','SpecialityInformationController@update')->name('editor_speciality_information_update');
        Route::get('/delete/{id}','SpecialityInformationController@delete')->name('editor_speciality_information_delete');
    });
    Route::group( ['prefix'=>'/seminar-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','SeminarInformationController@index')->name('editor_seminar_information_index');
        Route::get('/upcomming-seminar','SeminarInformationController@upcomming_seminar')->name('editor_upcomming_seminar_information');
        Route::get('/upcomming-seminar-update/{id}','SeminarInformationController@upcomming_seminar_update')->name('editor_upcomming_seminar_update_information');
        Route::get('/upcomming-seminar-view/{id}','SeminarInformationController@upcomming_seminar_view')->name('editor_upcomming_seminar_view_information');
        Route::get('/previous-seminar-index','SeminarInformationController@previous_seminar_index')->name('editor_previous_seminar_index_information');
        Route::get('/previous-seminar-update/{id}','SeminarInformationController@previous_seminar_update')->name('editor_previous_seminar_update_information');
        Route::get('/previous-seminar-view/{id}','SeminarInformationController@previous_seminar_view')->name('editor_previous_seminar_view_information');
        Route::get('/registration-seminar/{id}','SeminarInformationController@registration_seminar')->name('editor_registration_seminar_information');
        Route::get('/registration-seminar-delete/{id}','SeminarInformationController@registration_seminar_delete')->name('editor_registration_seminar_delete_information');
        Route::post('/store','SeminarInformationController@store')->name('editor_seminar_information_store');
        Route::get('/get/{id}','SeminarInformationController@get')->name('editor_seminar_information_get');
        Route::post('/update','SeminarInformationController@update')->name('editor_seminar_information_update');
        Route::post('/update-previous','SeminarInformationController@update_previous')->name('editor_seminar_information_update_previous');
        Route::get('/delete/{id}','SeminarInformationController@delete')->name('editor_seminar_information_delete');
    });
    Route::group( ['prefix'=>'/image-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','ImageInformationController@index')->name('editor_image_information_index');
        Route::post('/store','ImageInformationController@store')->name('editor_image_information_store');
        Route::get('/get/{id}','ImageInformationController@get')->name('editor_image_information_get');
        Route::post('/update','ImageInformationController@update')->name('editor_image_information_update');
        Route::get('/delete/{id}','ImageInformationController@delete')->name('editor_image_information_delete');
    });
    Route::group( ['prefix'=>'/about-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','AboutInformationController@index')->name('editor_about_information_index');
        Route::post('/update','AboutInformationController@update')->name('editor_about_information_update');
    });
    Route::group( ['prefix'=>'/blog-information', 'namespace' => 'Management'  ],function(){
        Route::get('/blog-comment', 'BlogInformationController@blog_comment')->name('editor_blog_comment');
        Route::get('/comment-list/{id}', 'BlogInformationController@get_commentjson')->name('editor_blog_get_commentjson');
        Route::get('/comment-accept', 'BlogInformationController@comment_accept')->name('editor_blog_comment_accept');
        Route::get('/comment-delete/{id}', 'BlogInformationController@comment_delete')->name('editor_blog_comment_delete');

        Route::get('/', 'BlogInformationController@list')->name('editor_blog_list');
        Route::get('/list/json', 'BlogInformationController@list_json')->name('editor_blog_list_json');
        Route::get('/get-json/{id}', 'BlogInformationController@get_json')->name('editor_blog_get_json');
        Route::get('/create', 'BlogInformationController@create')->name('editor_blog_create');
        Route::get('/edit/{id}', 'BlogInformationController@edit')->name('editor_blog_edit');
        Route::post('/url-check', 'BlogInformationController@url_check')->name('editor_blog_url_check');
        Route::post('/store', 'BlogInformationController@store')->name('editor_blog_store');
        Route::post('/update', 'BlogInformationController@update')->name('editor_blog_update');
        Route::get('/view/{id}', 'BlogInformationController@view')->name('editor_blog_view');
        Route::get('/destroy/{id}', 'BlogInformationController@destroy')->name('editor_blog_destroy');

        Route::get('/categories', 'BlogCategoryInformationController@categories')->name('editor_blog_categories');
        Route::get('/categories_tree_json', 'BlogCategoryInformationController@categories_tree_json')->name('editor_blog_categories_tree_json');
        Route::get('/create-category', 'BlogCategoryInformationController@create_category')->name('editor_blog_create_category');
        Route::get('/edit-category/{id}', 'BlogCategoryInformationController@edit_category')->name('editor_blog_edit_category');
        Route::get('/edit-data/{id}', 'BlogCategoryInformationController@category_data')->name('editor_blog_category_data');
        Route::post('/categorie-url-check', 'BlogCategoryInformationController@categorie_url_check')->name('editor_blog_categorie_url_check');
        Route::post('/store-category', 'BlogCategoryInformationController@store_category')->name('editor_blog_store_category');
        Route::post('/store-category-from-blog-create', 'BlogCategoryInformationController@store_category_from_blog_create')->name('editor_blog_store_category_from_blog_create');
        Route::post('/update-category', 'BlogCategoryInformationController@update_category')->name('editor_blog_update_category');
        Route::get('/view-category', 'BlogCategoryInformationController@view_category')->name('editor_blog_view_category');
        Route::post('/rearenge-category', 'BlogCategoryInformationController@rearenge_category')->name('editor_blog_rearenge_category');
        Route::get('/delete-category/{id}', 'BlogCategoryInformationController@category_delete')->name('editor_blog_category_delete');

    });
    Route::group( ['prefix'=>'/blog-tags-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','BlogTagsInformationController@index')->name('editor_blog_tags_information_index');
        Route::post('/store','BlogTagsInformationController@store')->name('editor_blog_tags_information_store');
        Route::get('/get/{id}','BlogTagsInformationController@get')->name('editor_blog_tags_information_get');
        Route::post('/update','BlogTagsInformationController@update')->name('editor_blog_tags_information_update');
        Route::get('/delete/{id}','BlogTagsInformationController@delete')->name('editor_blog_tags_information_delete');
    });
    Route::group( ['prefix'=>'/blog-comments-information', 'namespace' => 'Management'  ],function(){
        Route::get('/','BlogCommentsInformationController@index')->name('editor_blog_comments_information_index');
        Route::post('/store','BlogCommentsInformationController@store')->name('editor_blog_comments_information_store');
        Route::get('/get/{id}','BlogCommentsInformationController@get')->name('editor_blog_comments_information_get');
        Route::post('/update','BlogCommentsInformationController@update')->name('editor_blog_comments_information_update');
        Route::get('/delete/{id}','BlogCommentsInformationController@delete')->name('editor_blog_comments_information_delete');
    });

});

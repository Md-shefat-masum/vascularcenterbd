<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteBlogCategoriesInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_blog_category_info_website_blog_info', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('website_blog_info_id')->nullable();
            $table->bigInteger('website_blog_category_info_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_blog_category_info_website_blog_info');
    }
}

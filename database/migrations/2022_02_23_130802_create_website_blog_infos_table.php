<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteBlogInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_blog_infos', function (Blueprint $table) {
            $table->id();
            $table->text("url")->nullable();
            $table->string("title",200)->nullable();
            $table->string("image",200)->nullable();
            $table->text("short_description")->nullable();
            $table->longText("description")->nullable();
            $table->integer('category_id')->nullable();
            $table->text('tag_name')->nullable();
            $table->integer('creator')->default(1);
            $table->text('date')->nullable();
            $table->string('status',100)->default('inactive');
            $table->tinyInteger('add_to_featured')->default(2);
            $table->text("meta_tag")->nullable();
            $table->text('meta_description')->nullable();
            $table->bigInteger('view')->default(0);
            $table->text('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('search_keywords')->nullable();
            $table->text('category_list')->nullable();
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('website_blog_infos');
    }
}

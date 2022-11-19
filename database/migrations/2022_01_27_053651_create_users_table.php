<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->default(5);
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->string('photo', 100)->default('avatar.png');
            $table->string('phone', 100)->nullable();
            $table->string('email', 100)->nullable()->unique();

            $table->string('present_country', 100)->nullable();
            $table->string('present_district', 100)->nullable();
            $table->text('present_street')->nullable();
            $table->string('permanent_country', 100)->nullable();
            $table->string('permanent_district', 100)->nullable();
            $table->text('permanent_street')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('creator')->nullable();
            $table->string('slug', 50)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCourseLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_course_links',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_course_id');
                $table->unsignedBigInteger('course_link_id');
                $table->unsignedBigInteger('user_id');
                $table->boolean('completed')->default(false);
                $table->integer('points')->nullable();

                $table->timestamps();

                $table->foreign('user_course_id')->references('id')
                    ->on('user_courses')->onDelete('cascade');

                $table->foreign('course_link_id')->references('id')
                    ->on('course_links')->onDelete('cascade');

                $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_course_links');
    }
}

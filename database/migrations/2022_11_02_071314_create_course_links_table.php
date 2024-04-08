<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('chapter_id');
            $table->string('name');
            $table->string('name_arabic');
            $table->string('link');
            $table->integer('points');
            $table->boolean('free')->default(false);
            $table->timestamps();

            $table->foreign('course_id')->references('id')
                ->on('courses')->onDelete('cascade');

            $table->foreign('chapter_id')->references('id')
                ->on('course_chapters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_links');
    }
}

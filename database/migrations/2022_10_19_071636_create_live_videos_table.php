<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_videos', function (Blueprint $table) {
            $table->id();
            $table->string('name_english');
            $table->string('name_arabic');
            $table->unsignedBigInteger('chapter_id');
            $table->string('tag_english');
            $table->string('tag_arabic');
            $table->longText('description_english');
            $table->longText('description_arabic');
            $table->string('thumbnail')->nullable();
            $table->longText('link');

            $table->timestamps();

            $table->foreign('chapter_id')->references('id')
                ->on('live_video_chapter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_video_link');
    }
}

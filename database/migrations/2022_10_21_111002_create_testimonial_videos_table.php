<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial_videos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_arabic')->nullable();
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->string('designation')->nullable();
            $table->string('description_arabic')->nullable();
            $table->string('thumbnail')->nullable();
            $table->unsignedBigInteger('testimonial_video_type_id');
            $table->foreign('testimonial_video_type_id')->references('id')
                ->on('testimonial_videos_type')->onDelete('cascade');
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
        Schema::dropIfExists('testimonial_videos');
    }
}

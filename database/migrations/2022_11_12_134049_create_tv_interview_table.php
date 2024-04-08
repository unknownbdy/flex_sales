<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_interview', function (Blueprint $table) {
            $table->id();
            $table->string('topic_english');
            $table->string('topic_arabic');
            $table->string('channel_english');
            $table->string('channel_arabic');
            $table->string('show_english');
            $table->string('show_arabic');
            $table->string('tag_english');
            $table->string('description');
            $table->string('thumbnail')->nullable();
            $table->string('link');
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
        Schema::dropIfExists('tv_interview');
    }
}

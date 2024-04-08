<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoodSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mood_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mood_id');
            $table->unsignedBigInteger('mood_category_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('mood_id')->references('id')
                ->on('moods')->onDelete('cascade');
            $table->foreign('mood_category_id')->references('id')
                ->on('mood_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mood_sub_categories');
    }
}

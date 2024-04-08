<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoodCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mood_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mood_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('mood_id')->references('id')
                ->on('moods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mood_categories');
    }
}

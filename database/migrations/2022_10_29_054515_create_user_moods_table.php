<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_moods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mood_id');
            $table->unsignedBigInteger('mood_category_id');
            $table->unsignedBigInteger('mood_sub_category_id');
            $table->date('date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('mood_id')->references('id')
                ->on('moods')->onDelete('cascade');
            $table->foreign('mood_category_id')->references('id')
                ->on('mood_categories')->onDelete('cascade');
            $table->foreign('mood_sub_category_id')->references('id')
                ->on('mood_sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_moods');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLiveVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_live_videos',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('live_video_id');
                $table->boolean('completed')->default(false);
                $table->timestamps();

                $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');

                $table->foreign('live_video_id')->references('id')
                    ->on('live_videos')->onDelete('cascade');
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
        Schema::dropIfExists('user_live_videos');
    }
}

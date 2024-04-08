<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'challenge_videos',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('enlighting_challenge_id');
                $table->string('name');
                $table->string('name_arabic')->nullable();
                $table->string('show_name');
                $table->string('channel_name')->nullable();
                $table->string('channel_name_arabic')->nullable();
                $table->string('description');
                $table->string('description_arabic')->nullable();
                $table->string('video_url');
                $table->integer('day');
                $table->string('achievement_name')->nullable();
                $table->string('achievement_name_arabic')->nullable();
                $table->string('achievement_message')->nullable();
                $table->string('achievement_message_arabic')->nullable();
                $table->string('achievement_badge_url')->nullable();

                $table->timestamps();

                $table->foreign('enlighting_challenge_id')->references('id')
                    ->on('enlighting_challenges')->onDelete('cascade');
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
        Schema::dropIfExists('challenge_videos');
    }
}

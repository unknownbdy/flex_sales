<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'courses',
            function (Blueprint $table) {
                $table->id();
                $table->string('course_name');
                $table->string('course_name_arabic')->nullable();
                $table->string('tag')->nullable();
                $table->string('tag_arabic')->nullable();
                $table->string('description')->nullable();
                $table->string('description_arabic')->nullable();
                $table->decimal('price', 8, 2)->default(0);
                $table->string('thumbnail')->nullable();
                $table->enum(
                    'discount_type',
                    ["fixed", "percentage"]
                )->default("fixed");
                $table->integer('discount_amount')->nullable();
                $table->integer('total_points')->nullable();
                $table->integer('purchase_count')->default(0);
                $table->timestamps();
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
        Schema::dropIfExists('courses');
    }
}

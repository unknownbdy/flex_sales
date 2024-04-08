<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'purchase_details',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('purchase_id');
                $table->unsignedBigInteger('course_id');
                $table->decimal('price', 8, 2)->nullable();
                $table->string('discount_type')->nullable();
                $table->integer('discount_amount')->nullable();
                $table->decimal('original_price', 8, 2)->default(0);
                $table->timestamps();

                $table->foreign('purchase_id')->references('id')
                    ->on('purchases')->onDelete('cascade');

                $table->foreign('course_id')->references('id')
                    ->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_details');
    }
}

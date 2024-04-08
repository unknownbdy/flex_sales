<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contact_no')->nullable();
            $table->enum('gender', [null, 'male', 'female'])->nullable();
            $table->enum(
                'age',
                [
                    null, '<20', '21-25', '26-30', '31-35', '36-40',
                    '41-50', '51-60', '60-75'
                ]
            )->nullable();
            $table->string('password');
            $table->string('type');
            $table->string('lang');
            $table->string('dob')->nullable();
            $table->bigInteger('created_by');
            $table->tinyInteger('is_admin')->default(0);
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}

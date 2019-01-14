<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('school_user', function (Blueprint $table) {
            $table->uuid('school_id');
            $table->foreign('school_id')->references('id')->on('schools');

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
        Schema::dropIfExists('school_user');
    }
}

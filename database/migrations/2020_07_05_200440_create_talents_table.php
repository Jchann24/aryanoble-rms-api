<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pic_id');
            $table->unsignedBigInteger('candidate_account_id')->nullable();
            $table->string('name');
            $table->string('source');
            $table->string('cv');
            $table->string('address');
            $table->string('applied_position');
            $table->date('dob');
            $table->string('email');
            $table->string('gender');
            $table->string('last_education');
            $table->string('mobile_phone');
            $table->string('nik');
            $table->tinyInteger('total_working_experience');
            $table->string('university');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pic_id')->references('id')->on('users');
            $table->foreign('candidate_account_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talents');
    }
}

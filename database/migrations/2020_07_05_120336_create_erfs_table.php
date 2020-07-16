<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erfs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('div_user_id');
            $table->string('title');
            $table->smallInteger('age_range_from');
            $table->smallInteger('age_range_to');
            $table->string('branch');
            $table->text('business_justification');
            $table->string('department');
            $table->string('division');
            $table->string('education');
            $table->string('employee_status');
            $table->string('job_title');
            $table->tinyInteger('min_experience');
            $table->string('planning');
            $table->string('purpose');
            $table->tinyInteger('quantity');
            $table->string('sex');
            $table->text('technical_competencies');
            $table->string('work_location');
            $table->string('working_hours');
            $table->string('position');
            $table->string('company');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('div_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('erfs');
    }
}

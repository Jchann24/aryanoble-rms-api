<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErfAcceptancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erf_acceptances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('erf_id');
            $table->tinyInteger('acceptance');
            $table->text('notes')->nullable();
            $table->text('notes_by_pic')->nullable();
            $table->string('last_updated_by')->nullable();
            $table->timestamps();

            $table->foreign('erf_id')->references('id')->on('erfs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('erf_acceptances');
    }
}

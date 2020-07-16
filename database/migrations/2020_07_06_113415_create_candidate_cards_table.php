<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("status_id")->default(1);
            $table->unsignedBigInteger("candidate_id")->nullable();
            $table->unsignedBigInteger("erf_id");
            $table->unsignedBigInteger("pic_id");
            $table->unsignedBigInteger("talent_id")->nullable();
            $table->unsignedBigInteger("interview_detail_id")->nullable();
            $table->unsignedBigInteger("last_updated_by_id")->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("status_id")->references("id")->on("statuses");
            $table->foreign("candidate_id")->references("id")->on("users");
            $table->foreign("pic_id")->references("id")->on("users");
            $table->foreign("erf_id")->references("id")->on("erfs");
            $table->foreign("talent_id")->references("id")->on("talents");
            $table->foreign("interview_detail_id")->references("id")->on("interview_details");
            $table->foreign("last_updated_by_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_cards');
    }
}

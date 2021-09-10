<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisalreports', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('appraisal_id')->index()->unsigned()->nullable();   
            $table->bigInteger('user_id')->index()->unsigned()->nullable();
            $table->bigInteger('qualification_id')->index()->unsigned()->nullable();
            $table->bigInteger('juniorqualification_id')->index()->unsigned()->nullable();
            $table->bigInteger('additionalqualif_id')->index()->unsigned()->nullable();
            $table->bigInteger('profmembership_id')->index()->unsigned()->nullable();
            $table->bigInteger('salaryscale_id')->index()->unsigned()->nullable();
            $table->bigInteger('promotion_id')->index()->unsigned()->nullable();
            $table->bigInteger('appraisalscore_id')->index()->unsigned()->nullable();

            $table->foreign('appraisal_id')->references('id')->on('appraisals')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('qualification_id')->references('id')->on('qualifications')->onDelete('cascade');
            $table->foreign('juniorqualification_id')->references('id')->on('juniorqualifications')->onDelete('cascade');
            $table->foreign('additionalqualif_id')->references('id')->on('additionalqualifs')->onDelete('cascade');
            $table->foreign('profmembership_id')->references('id')->on('profmemberships')->onDelete('cascade');
            $table->foreign('salaryscale_id')->references('id')->on('salaryscales')->onDelete('cascade');
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');
            $table->foreign('appraisalscore_id')->references('id')->on('appraisalscores')->onDelete('cascade');
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
        Schema::dropIfExists('appraisalreports');
    }
}

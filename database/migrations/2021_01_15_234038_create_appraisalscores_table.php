<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisalscores', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('appraisal_id')->index()->unsigned()->nullable();
            $table->bigInteger('user_id')->index()->unsigned()->nullable();
            $table->string('publicationscore')->nullable();
            $table->string('productionscore')->nullable();
            $table->string('adminresponscore')->nullable();
            $table->string('qualificationscore')->nullable();
            $table->string('abilityscore')->nullable();
            $table->string('servicelengthscore')->nullable();
            $table->string('totalscore')->nullable();
            $table->text('freecomment')->nullable();
            $table->string('recommendation')->nullable();
            $table->tinyInteger('isscored')->default('0');
            $table->foreign('appraisal_id')->references('id')->on('appraisals')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('appraisalscores');
    }
}

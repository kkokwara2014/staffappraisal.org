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
            $table->string('productivityscore')->nullable();
            $table->string('initiativescore')->nullable();
            $table->string('acceptanceofrespscore')->nullable();
            $table->string('judgementscore')->nullable();
            $table->string('staffmgtscore')->nullable();
            $table->string('communicationscore')->nullable();
            $table->string('relationshipscore')->nullable();
            $table->string('reliabilityscore')->nullable();
            $table->string('determinationscore')->nullable();
            $table->string('thorougnessscore')->nullable();
            $table->string('publicrelationscore')->nullable();
            $table->string('punctualityscore')->nullable();
            $table->string('regularityscore')->nullable();
            $table->string('foresightscore')->nullable();
            $table->string('applicationtodutyscore')->nullable();
            $table->string('outputofworkscore')->nullable();
            $table->string('qualityofworkscore')->nullable();
            $table->string('warningletterscore')->nullable();
            $table->string('offdutyonhealthscore')->nullable();
            $table->string('numberofcommendationscore')->nullable();
            $table->string('trainingpotentialscore')->nullable();
            $table->string('totalscore')->nullable();
            $table->text('freecomment')->nullable();
            $table->text('recommendation')->nullable();
            $table->string('appraisedby')->nullable();
            $table->text('appraiseremail')->nullable();
            $table->tinyInteger('isrecommbyhod')->default('0');
            $table->tinyInteger('isscored')->default('0');
            $table->text('acceptorrejectcomment')->nullable();
            $table->tinyInteger('staffcommented')->default('0');
            $table->text('schboardrecomm')->nullable();
            $table->tinyInteger('isrecommbyschboard')->default('0');
            $table->string('schboardrecommender')->nullable();
            $table->string('daterecommbyschboard')->nullable();
            $table->text('managementrecomm')->nullable();
            $table->tinyInteger('isrecommbymanagement')->default('0');
            $table->string('managementrecommender')->nullable();
            $table->string('daterecommbymanagement')->nullable();
            $table->text('ssapcrecomm')->nullable();
            $table->tinyInteger('isrecommbyssapc')->default('0');
            $table->string('ssapcrecommender')->nullable();
            $table->string('daterecommbyssapc')->nullable();
            $table->text('councilrecomm')->nullable();
            $table->tinyInteger('isrecommbycouncil')->default('0');
            $table->string('councilrecommender')->nullable();
            $table->string('daterecommbycouncil')->nullable();
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

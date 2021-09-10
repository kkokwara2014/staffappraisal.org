<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuniorqualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juniorqualifications', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('appraisal_id')->index()->unsigned()->nullable();
            $table->bigInteger('user_id')->index()->unsigned()->nullable();
            $table->string('qualification')->index()->nullable();
            $table->string('dateobtained')->index()->nullable();
            $table->string('specialization')->index()->nullable();         
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
        Schema::dropIfExists('juniorqualifications');
    }
}

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
            $table->engine='InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('title_id')->index()->unsigned()->nullable()->default('1');
            $table->bigInteger('rank_id')->index()->unsigned()->nullable()->default('1');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->string('firstname');
            $table->string('staffnumb')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dob')->nullable();
            $table->string('assumptiondate')->nullable();
            $table->string('firstassumptionstatus')->nullable();
            $table->string('confirmationdate')->nullable();
            $table->string('resignationdate')->nullable();
            $table->string('numofchildren')->nullable();
            $table->string('userimage')->default('defaultuserimage.jpg');
            $table->bigInteger('school_id')->index()->unsigned()->nullable()->default('1');
            $table->bigInteger('department_id')->index()->unsigned()->nullable()->default('1');
            $table->bigInteger('maritalstatus_id')->index()->unsigned()->nullable()->default('1');
            $table->bigInteger('state_id')->index()->unsigned()->nullable()->default('38');
            $table->bigInteger('lga_id')->index()->unsigned()->nullable()->default('813');
            $table->bigInteger('category_id')->index()->unsigned()->nullable()->default('1');
            $table->bigInteger('creator_id')->index()->unsigned()->nullable()->default('1');
            $table->tinyInteger('isactive')->default('1');
            $table->tinyInteger('profileupdated')->default('0');
            $table->tinyInteger('isretired')->default('0');
            $table->string('leaveent')->default('37');
            $table->rememberToken();
            //for OTP
            $table->string('two_factor_code')->nullable();
            $table->datetime('two_factor_expires_at')->nullable();

            $table->datetime('login_at')->nullable();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('lga_id')->references('id')->on('lgas')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online-cv', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nationality');
            $table->string('na_id')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('dob');
            $table->string('mobile');
            $table->string('gender');
            $table->string('maritial_status');
            $table->string('present_add');
            $table->string('permanent_add');
            $table->string('job_type')->nullable();
            $table->string('exp_salary')->nullable();
            $table->string('level_education')->nullable();
            $table->string('board_education')->nullable();
            $table->string('institiute-name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('compnay_buisness')->nullable();
            $table->string('designation')->nullable();
            $table->string('compnay_loacation')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('images');
            $table->integer('user_id');
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
        Schema::dropIfExists('online-cv');
    }
}

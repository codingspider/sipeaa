<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_title'); 
            $table->string('company_name'); 
            $table->string('job_position'); 
            $table->string('category_name'); 
            $table->string('expected_salary'); 
            $table->integer('user_id'); 
            $table->integer('status'); 
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
        Schema::dropIfExists('job_applies');
    }
}

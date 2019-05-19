<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable(); 
            $table->string('last_name')->nullable(); 
            $table->string('user_id')->nullable(); 
            $table->string('phone')->nullable(); 
            $table->string('blood_group')->nullable(); 
            $table->string('addmission_year')->nullable(); 
            $table->string('passing_year')->nullable(); 
            $table->string('reg_no')->nullable(); 
            $table->string('batch_no')->nullable(); 
            $table->string('experience_year')->nullable(); 
            $table->string('job_area')->nullable(); 
            $table->string('job_skill')->nullable(); 
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
        Schema::dropIfExists('members');
    }
}

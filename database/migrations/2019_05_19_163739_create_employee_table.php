<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable(); 
            $table->string('contact_person')->nullable(); 
            $table->string('contact_person_designation')->nullable(); 
            $table->string('contact_person_mobile')->nullable(); 
            $table->string('contact_person_email')->nullable(); 
            $table->string('description')->nullable(); 
        

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
        Schema::dropIfExists('employee');
    }
}

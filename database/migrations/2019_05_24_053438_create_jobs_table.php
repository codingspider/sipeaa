<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company_name');
            $table->string('job_position');
            $table->string('no_vacancy');
            $table->integer('job_category_id');
            $table->integer('job_location_id');
            $table->text('job_details');
            $table->string('job_type');
            $table->string('salary');
            $table->string('application_deadline');
            $table->string('application_instruction');
            $table->string('company_image');
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
        Schema::dropIfExists('jobs');
    }
}

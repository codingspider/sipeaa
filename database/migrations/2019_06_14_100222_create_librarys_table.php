<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librarys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_type');
            $table->string('description');
            $table->string('update_date');
            $table->string('doc_file');
            $table->integer('user_id');
            $table->string('agriment_status');
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
        Schema::dropIfExists('librarys');
    }
}

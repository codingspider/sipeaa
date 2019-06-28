<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->unsigned();
            $table->integer('admin_sender_id')->unsigned();
            $table->integer('sent_to_id')->unsigned();
            $table->text('body');
            $table->text('subject');
            $table->string('attachment')->nullable();
            $table->integer('notify_status');

            // It's better to work with default timestamp names:

            // `sender_id` field referenced the `id` field of `users` table:
            $table->foreign('sender_id')
                  ->references('id')
                  ->on('users');

            // Let's add another foreign key on the same table,
            // but this time fot the `sent_to_id` field:
            $table->foreign('sent_to_id')
                  ->references('id')
                  ->on('users');
                  
            $table->foreign('admin_sender_id')
                  ->references('id')
                  ->on('cms_users');
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
        Schema::dropIfExists('messages');
    }
}

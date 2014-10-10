<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('msg_messages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('thread_id');
            $table->integer('sender_id');
            $table->text('body');
            $table->string('priority');
            $table->date('cdate');
        });

        Schema::create('msg_participants', function(Blueprint $table)
        {
            $table->integer('user_id');
            $table->integer('thread_id');
            $table->date('cdate');
            $table->primary(['user_id','thread_id']);
        });

        Schema::create('msg_status', function(Blueprint $table)
        {
            $table->integer('message_id');
            $table->integer('user_id');
            $table->tinyInteger('status');
            $table->primary(['message_id','user_id']);
        });

        Schema::create('msg_threads', function(Blueprint $table)
        {
            $table->integer('message_id');
            $table->string('subject');
            $table->string('participants',100);
            $table->primary(['message_id']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('msg_messages');
        Schema::drop('msg_participants');
        Schema::drop('msg_status');
        Schema::drop('msg_threads');
	}

}

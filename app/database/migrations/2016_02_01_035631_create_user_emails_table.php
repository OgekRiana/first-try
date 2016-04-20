<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_emails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->string('address');
			$table->boolean('confirmed')->default(false);
			$table->string('token', 32);
			$table->timestamps();

			$table->index('user_id');
			$table->unique('address');
			$table->index('confirmed');
			$table->index(array('user_id','address'));
			$table->index(array('user_id','confirmed'));

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_emails');
	}

}

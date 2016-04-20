<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('password',100)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->string('first_name',100);
			$table->string('last_name',100);
			$table->smallInteger('gender')->nullable();
			$table->date('dob')->nullable();
			$table->string('phone')->nullable();
			$table->smallInteger('status')->nullable();
			$table->string('avatar')->nullable();
			$table->timestamp('last_login')->nullable();
			$table->string('last_ip')->nullable();
			$table->timestamps();

			$table->index(array('first_name','last_name'));
			$table->index('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

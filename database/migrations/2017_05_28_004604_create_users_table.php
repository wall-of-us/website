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
			$table->string('name')->default('');
			$table->string('email')->unique();
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->string('state')->nullable();
			$table->string('city')->nullable();
			$table->string('twitter')->nullable();
			$table->string('zip', 10)->nullable();
			$table->string('facebook_id')->nullable();
			$table->string('facebook')->nullable();
			$table->string('avatar')->nullable();
			$table->string('picture')->nullable()->default('/uploads/users/default.png');
			$table->string('state_house')->nullable();
			$table->string('state_senate')->nullable();
			$table->string('congressional_district')->nullable();
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}

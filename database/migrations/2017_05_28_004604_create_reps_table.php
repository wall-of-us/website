<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('member_first')->nullable();
			$table->string('member_last')->nullable();
			$table->string('membertype')->nullable();
			$table->string('running')->nullable();
			$table->string('party')->nullable();
			$table->string('district', 4)->nullable();
			$table->string('district_phone')->nullable();
			$table->string('dc_phone')->nullable();
			$table->string('address1')->nullable();
			$table->string('address2')->nullable();
			$table->string('city')->nullable();
			$table->string('state', 11)->nullable();
			$table->string('zip', 11)->nullable();
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
		Schema::drop('reps');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePositionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('positions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('rep_id')->nullable();
			$table->string('member')->nullable();
			$table->string('issue')->nullable();
			$table->integer('related_action')->nullable();
			$table->string('bill_number')->nullable();
			$table->string('vote')->nullable();
			$table->text('position', 65535)->nullable();
			$table->text('script', 65535)->nullable();
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
		Schema::drop('positions');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContributorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contributors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('crp_id')->nullable();
			$table->string('cand_name')->nullable();
			$table->string('total')->nullable();
			$table->string('pacs')->nullable();
			$table->string('indivs')->nullable();
			$table->string('org_name')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contributors');
	}

}

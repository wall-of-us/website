<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('house', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('prop_id', 10)->nullable();
			$table->string('crp_id')->nullable();
			$table->string('api_uri')->nullable();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('middle_name')->nullable();
			$table->string('party')->nullable();
			$table->string('twitter_account')->nullable();
			$table->string('facebook_account')->nullable();
			$table->string('google_entity_id')->nullable();
			$table->string('url')->nullable();
			$table->string('contact_form')->nullable();
			$table->string('seniority')->nullable();
			$table->string('next_election')->nullable();
			$table->string('ocd_id')->nullable();
			$table->string('office')->nullable();
			$table->string('phone')->nullable();
			$table->string('fax')->nullable();
			$table->string('state')->nullable();
			$table->string('votes_with_party_pct')->nullable();
			$table->string('slug')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('house');
	}

}

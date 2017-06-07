<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernorpostionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('governors_positions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->string('issue')->nullable();
            $table->integer('related_action')->nullable();
            $table->text('position', 65535)->nullable();
            $table->string('desc_source')->nullable();
            $table->string('source')->nullable();
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
        Schema::drop('governors_positions');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarvestTable extends Migration {

	public function up()
	{
		Schema::create('harvest', function($table)
		{
			$table->increments('id');
			$table->enum('source', ['UXREACTIONS', 'CODINGLOVE'])->index();
			$table->string('url', 2088)->index();
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
	}

	public function down()
	{
		Schema::drop('harvest');
	}

}

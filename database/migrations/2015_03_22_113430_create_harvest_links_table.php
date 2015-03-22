<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarvestLinksTable extends Migration {

	public function up()
	{
		Schema::create('harvest_links', function($table)
		{
			$table->increments('id');
			$table->enum('source', ['UXREACTIONS', 'THECODINGLOVE'])->index();
			$table->string('url', 2088)->index();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('harvest_links');
	}

}

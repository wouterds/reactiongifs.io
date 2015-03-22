<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGifsTable extends Migration {

	public function up()
	{
		Schema::create('gifs', function($table)
		{
			$table->increments('id');
			$table->string('md5', 32)->unique();
			$table->integer('size');
			$table->integer('width');
			$table->integer('height');
			$table->string('url', 2088);
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
	}

	public function down()
	{
		Schema::drop('gifs');
	}

}

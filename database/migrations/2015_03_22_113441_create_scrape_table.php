<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrapeTable extends Migration {

	public function up()
	{
		Schema::create('scrape', function($table)
		{
			$table->increments('id');
			$table->integer('harvest_id')->index();
			$table->integer('gif_id')->index()->nullable();
			$table->string('md5', 32);
			$table->longText('raw');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
	}

	public function down()
	{
		Schema::drop('scrape');
	}
}

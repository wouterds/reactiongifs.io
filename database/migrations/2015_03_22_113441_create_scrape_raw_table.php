<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrapeRawTable extends Migration {

	public function up()
	{
		Schema::create('scrape_raw', function($table)
		{
			$table->increments('id');
			$table->integer('harvest_link_id')->index();
			$table->integer('gif_id')->index()->nullable();
			$table->string('md5', 32);
			$table->longText('raw');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('scrape_raw');
	}
}

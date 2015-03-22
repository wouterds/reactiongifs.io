<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMimeTypeAndRenameGifsToPicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gifs', function($table)
		{
			$table->string('mimetype', 16)->after('md5');
		});

		Schema::table('scrape_raws', function($table)
		{
			$table->renameColumn('gif_id', 'picture_id');
		});

		Schema::table('entries', function($table)
		{
			$table->renameColumn('gif_id', 'picture_id');
		});

		Schema::rename('gifs', 'pictures');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('scrape_raws', function($table)
		{
			$table->renameColumn('picture_id', 'gif_id');
		});

		Schema::table('entries', function($table)
		{
			$table->renameColumn('picture_id', 'gif_id');
		});

		Schema::table('pictures', function($table)
		{
			$table->dropColumn('mimetype');
		});

		Schema::rename('pictures', 'gifs');
	}

}

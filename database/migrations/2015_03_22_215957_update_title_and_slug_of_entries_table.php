<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTitleAndSlugOfEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entries', function($table)
		{
			$table->string('title', 256)->change();
			$table->string('slug', 256)->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entries', function($table)
		{
			$table->string('title', 64)->change();
			$table->string('slug', 64)->change();
		});
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSlugIndexOfEntries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entries', function($table)
		{
			$table->dropUnique('entries_slug_unique');
			$table->index('slug');
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
			$table->dropIndex('entries_slug_index');
			$table->unique('slug');
		});
	}

}

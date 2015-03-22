<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublishedDateToEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entries', function($table)
		{
			$table->timestamp('published_at')->after('picture_id')->default(DB::raw('CURRENT_TIMESTAMP'));
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
			$table->dropColumn('created_at');
		});
	}

}

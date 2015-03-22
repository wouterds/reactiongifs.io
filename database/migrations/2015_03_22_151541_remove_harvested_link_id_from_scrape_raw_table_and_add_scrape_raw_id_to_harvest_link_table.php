<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveHarvestedLinkIdFromScrapeRawTableAndAddScrapeRawIdToHarvestLinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('scrape_raw', function($table)
		{
			$table->dropColumn('harvest_link_id');
		});

		Schema::table('harvest_links', function($table)
		{
			$table->integer('scrape_raw_id')->after('id')->index()->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('scrape_raw', function($table)
		{
			$table->integer('harvest_link_id')->index();
		});

		Schema::table('harvest_links', function($table)
		{
			$table->dropColumn('scrape_raw_id');
		});
	}

}

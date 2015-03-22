<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
		'App\Console\Commands\Harvest',
		'App\Console\Commands\HarvestTheCodingLove',
		'App\Console\Commands\HarvestUXReactions',
		'App\Console\Commands\Scrape',
		'App\Console\Commands\ScrapeTheCodingLove',
		'App\Console\Commands\ScrapeUXReactions',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')->hourly();
		$schedule->command('harvest:thecodinglove')->hourly();
		$schedule->command('scrape:thecodinglove')->hourly();
	}

}

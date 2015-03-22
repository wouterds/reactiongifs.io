<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use App\HarvestLink;

use GuzzleHttp;
use FluentDOM;

class HarvestTheCodingLove extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'harvest:thecodinglove';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Harvest from The Coding Love.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info("Starting harvesting from the coding love..\n");

		$this->harvestPage();
	}

	private function harvestPage($page = 1)
	{
		if (is_numeric($page)) {
			$page = '/page/' . $page;
		}

		$url = 'http://thecodinglove.com' . $page;

		$this->info("Harvesting " . $url);

		$client = new GuzzleHttp\Client();
		$response = $client->get($url);

		if ($body = $response->getBody()) {
			$dom = FluentDOM::QueryCss($body, 'text/html');

			$links = $dom->find('#main div.post h3 a');

			$this->info("Found " . count($links) . " links");

			$links->each(function($link) {
				$link = FluentDOM::QueryCss($link);
				$link = $link->attr('href');

				if (HarvestLink::where('url', $link)->count() === 0) {
					$harvest = new HarvestLink();
					$harvest->source = 'THECODINGLOVE';
					$harvest->url = $link;
					$harvest->save();

					$this->info('Adding ' . $link);
				} else {
					$this->error('Skipping ' . $link);
				}
			});

			$nextPage = $dom->find('div.footer a.previouslink');

			echo "\n";

			$link = $nextPage ? $nextPage->attr('href') : null;
			if ($link) {
				return $this->harvestPage($link);
			}

			return $this->info('Finished, we have ran out of pages.');
		}

		return $this->error('Failed to get body..');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}

}

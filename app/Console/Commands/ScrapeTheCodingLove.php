<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use App\HarvestLink;
use App\ScrapeRaw;

use GuzzleHttp;

class ScrapeTheCodingLove extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'scrape:thecodinglove';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Scrape the remaining The Coding Love harvested links.';

	private $batchSize = 10;

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
		$this->info("Starting scraping from the coding love..\n");

		$this->scrapeBatch();
	}

	private function scrapeBatch()
	{
		$batch = HarvestLink::where('scrape_raw_id', null)->take($this->batchSize)->orderBy('created_at', 'ASC')->get();

		$this->info("Fetched " . count($batch) . " links");

		foreach ($batch as $harvestLink) {
			$this->scrapeLink($harvestLink);
		}

		echo "\n";

		if (count($batch) === $this->batchSize) {
			return $this->scrapeBatch();
		}

		$this->info("Everything is scraped!");
	}

	private function scrapeLink($harvestLink)
	{
		$this->info("Scraping " . $harvestLink->url);

		$client = new GuzzleHttp\Client();
		$response = $client->get($harvestLink->url);

		if ($body = $response->getBody()) {
			$scrapeRaw = new ScrapeRaw();
			$scrapeRaw->raw = $body;
			$scrapeRaw->md5 = md5($body);
			$scrapeRaw->save();

			$harvestLink->scrape_raw_id = $scrapeRaw->id;
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

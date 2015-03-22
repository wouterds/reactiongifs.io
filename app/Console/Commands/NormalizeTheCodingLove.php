<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use GuzzleHttp;
use FluentDOM;

use App\Gif;
use App\ScrapeRaw;

class NormalizeTheCodingLove extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'normalize:thecodinglove';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Normalize The Coding Love.';

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
		$this->normalizeBatch();
	}

	private function normalizeBatch()
	{
		$batch = ScrapeRaw::with('harvestLink')->where('gif_id', null)->take($this->batchSize)->orderBy('created_at', 'ASC')->get();

		$this->info("Fetched " . count($batch) . " links");

		foreach ($batch as $rawData) {
			$this->normalizeRaw($rawData);
		}

		echo "\n";

		if (count($batch) === $this->batchSize) {
			return $this->normalizeBatch();
		}

		$this->info("Everything is normalized!");
	}

	private function getImageData($imgSrc)
	{
		$client = new GuzzleHttp\Client();
		$response = $client->get($imgSrc);

		if ($body = $response->getBody()) {
			$filename = sha1($imgSrc . microtime()) . '.gif';
			$tmpFile = '/tmp/' . $filename;
			file_put_contents($tmpFile, $body);

			$info = getimagesize($tmpFile);

			$newFolder = 'static/img/';
			$newPath = $newFolder . $filename;

			if (!file_exists($newFolder)) {
				mkdir($newFolder, 0755, true);
			}

			rename($tmpFile, $newPath);

			return [
				'width' => $info[0],
				'height' => $info[1],
				'mime' => $info["mime"],
				'md5' => md5_file($newPath),
				'size' => filesize($newPath),
				'url' => '//static.reactiongifs.io/img/' . $filename,
				'local' => $newPath
			];
		}

		return false;
	}

	private function normalizeRaw($rawData)
	{
		$this->info("Normalizing " . $rawData->md5);

		$dom = FluentDOM::QueryCss($rawData->raw, 'text/html');

		$post = $dom->find('#main div.post');

		if (empty($post)) {
			return $this->error("Failed normalizing");
		}

		$img = $post->find('img')->attr('src');
		$imgData = $this->getImageData($img);

		if ($imgData === false) {
			return $this->error("Failed getting image data");
		}

		$gif = new Gif($imgData);
		$gif->save();

		$rawData->gif_id = $gif->id;
		$rawData->save();

		$title = $post->find('h3')->text();
		$slug = Str::slug($title);

		$entry = new Entry();
		$entry->gif_id = $gif->id;
		$entry->title = $title;
		$entry->slug = $slug;
		$entry->save();

		return true;
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

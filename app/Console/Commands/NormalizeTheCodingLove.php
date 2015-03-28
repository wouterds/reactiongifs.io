<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use GuzzleHttp;
use FluentDOM;

use App\Picture;
use App\Entry;
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
		$batch = ScrapeRaw::whereHas('harvestLink', function($query) {
			$query->where('source', 'THECODINGLOVE');
		})->where('picture_id', null)->take($this->batchSize)->orderBy('created_at', 'ASC')->get();

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

	private $extensionType = 0;

	private function getImage($imgSrc)
	{
		if ($this->extensionType === 1) {
			$imgSrc = str_replace('.gif', '.jpg', $imgSrc);
		}

		$response = null;

		try {
			$client = new GuzzleHttp\Client();
			$response = $client->get($imgSrc);
		} catch (\Exception $e) {
			$this->error('COULD NOT GET IMAGE! Exception: ' . $e->getMessage());

			if ($e->getCode() === 404) {
				$this->info('Retrying with new extension..');

				$this->extensionType = 1;
				return $this->getImage($imgSrc);
			}
		}

		return $response;
	}

	private function getImageData($imgSrc)
	{
		$imgSrc = str_replace('.gifv', '.gif', $imgSrc);
		$imgSrc = str_replace('.webm', '.gif', $imgSrc);
		$imgSrc = str_replace('.jpg', '.gif', $imgSrc);

		$response = $this->getImage($imgSrc);

		if ($response && $body = $response->getBody()) {
			if (empty($body)) {
				return null;
			}

			$filename = sha1($imgSrc . microtime()) . '.gif';
			$tmpFile = '/tmp/' . $filename;
			file_put_contents($tmpFile, $body);

			$info = getimagesize($tmpFile);

			$newFolder = 'static/img/';
			$newPath = $newFolder . $filename;

			if (!file_exists($newFolder)) {
				mkdir($newFolder, 0755, true);
			}

			return [
				'width' => $info[0],
				'height' => $info[1],
				'mimetype' => $info["mime"],
				'md5' => md5_file($tmpFile),
				'size' => filesize($tmpFile),
				'url' => '//static.reactiongifs.io/img/' . $filename,
				'local' => $newPath,
				'tmp' => $tmpFile
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

		try {
			$img = $post->find('img')->attr('src');

			if (empty($img)) {
				$img = $post->find('video source')->first()->attr('src');
			}

			if (substr($img, 0, 2) === '//') {
				$img = 'http:' . $img;
			}

			$this->info("Downloading image " . $img);

			$imgData = $this->getImageData($img);

			if ($imgData === false) {
				$rawData->picture_id = 0;
				$rawData->save();
				return $this->error("Failed getting image data");
			}

			$picture = Picture::where('md5', $imgData['md5'])->first();

			if (!$picture) {
				rename($imgData['tmp'], $imgData['local']);

				$picture = new Picture();
				$picture->width = $imgData['width'];
				$picture->height = $imgData['height'];
				$picture->url = $imgData['url'];
				$picture->mimetype = $imgData['mimetype'];
				$picture->size = $imgData['size'];
				$picture->md5 = $imgData['md5'];
				$picture->url = $imgData['url'];
				$picture->save();
			} else {
				unlink($imgData['tmp']);
			}

			$rawData->picture_id = $picture->id;
			$rawData->save();

			$title = $post->find('h3')->text();
			$slug = Str::slug($title);

			$entry = Entry::where('slug', $slug)->where('picture_id', $picture->id)->first();

			if ($entry) {
				return;
			}

			$entry = new Entry();
			$entry->picture_id = $picture->id;
			$entry->title = $title;
			$entry->slug = $slug;
			$entry->save();
		} catch (Exception $e) {
			$this->error("Failed normalizing");
			return $this->error("Error: " . $e->getMessage());
		}

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

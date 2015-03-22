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

class NormalizeUXReactions extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'normalize:uxreactions';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Normalize UX Reactions.';

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
			$query->where('source', 'UXREACTIONS');
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

	private function getImageData($imgSrc)
	{
		$imgSrc = str_replace('.gifv', '.gif', $imgSrc);

		try {
			$client = new GuzzleHttp\Client();
			$response = $client->get($imgSrc);
		} catch (\Exception $e) {
			$this->error($e->getMessage());
			return null;
		}

		if ($body = $response->getBody()) {
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

	private function convert_smart_quotes($string) {
		$chr_map = [
			"\xC2\x82" => "'",			"\xC2\x84" => '"',			"\xC2\x8B" => "'",			"\xC2\x91" => "'",
			"\xC2\x92" => "'",			"\xC2\x93" => '"',			"\xC2\x94" => '"',			"\xC2\x9B" => "'",
			"\xC2\xAB" => '"',			"\xC2\xBB" => '"',			"\xE2\x80\x98" => "'",		"\xE2\x80\x99" => "'",
			"\xE2\x80\x9A" => "'",		"\xE2\x80\x9B" => "'",		"\xE2\x80\x9C" => '"',		"\xE2\x80\x9D" => '"',
			"\xE2\x80\x9E" => '"',		"\xE2\x80\x9F" => '"',		"\xE2\x80\xB9" => "'",		"\xE2\x80\xBA" => "'"
		];
		$chr = array_keys($chr_map);
		$rpl = array_values($chr_map);
		return str_replace($chr, $rpl, html_entity_decode($string, ENT_QUOTES, "UTF-8"));
	}

	private function normalizeRaw($rawData)
	{
		$this->info("Normalizing " . $rawData->md5);

		$dom = FluentDOM::QueryCss($rawData->raw, 'text/html');

		$post = $dom->find('#page #content div.post');

		if (empty($post)) {
			return $this->error("Failed normalizing");
		}

		try {
			$img = $post->find('.caption img')->attr('src');
			$imgData = $this->getImageData($img);

			if (!$imgData) {
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
			}

			$rawData->picture_id = $picture->id;
			$rawData->save();

			$title = $post->find('.title h1')->text();
			if (substr($title, strlen($title) - 1, 1) === ':') {
				$title = substr($title, 0, strlen($title) - 1);
			}
			$title = $this->convert_smart_quotes($title);
			$slug = Str::slug($title);

			$time = $post->find('div.metadata div.date a')->text();
			$time = strtotime($time);

			$entry = Entry::where('slug', $slug)->where('picture_id', $picture->id)->first();

			if ($entry) {
				return;
			}

			$entry = new Entry();
			$entry->picture_id = $picture->id;
			$entry->title = $title;
			$entry->slug = $slug;
			$entry->published_at = $time;
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

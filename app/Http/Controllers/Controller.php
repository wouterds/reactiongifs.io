<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use View;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	private $meta;
	private $title = 'Reactiongifs.IO';
	private $titlePart;
	private $ogTitle;
	private $ogImage;
	private $og = ['image' => null, 'title' => null];

	function __construct() {
		$this->version();
		$this->meta();
	}

	public function setTitle($title)
	{
		$this->title = $title;
		$this->meta();
	}

	public function setTitlePart($titlePart)
	{
		$this->titlePart = $titlePart;
		$this->meta();
	}

	public function setOgTitle($ogTitle)
	{
		$this->ogTitle = $ogTitle;
		$this->meta();
	}

	public function setOgImage($ogImage)
	{
		$this->ogImage = $ogImage;
		$this->meta();
	}

	private function og()
	{
		if ($this->ogTitle) {
			$this->og['title'] = $this->ogTitle;
		} else {
			$this->og['title'] = $this->title;
		}

		if ($this->ogImage) {
			$this->og['image'] = $this->ogImage;
		}
	}

	private function meta()
	{
		if ($this->titlePart) {
			$this->title .= ' | ' . $this->titlePart;
		}

		$this->og();

		$this->meta = [
			'title' => $this->title,
			'og' => $this->og
		];
		View::share('meta', $this->meta);
	}

	private function version()
	{
		$repo = new \GitElephant\Repository(base_path());
		$lastCommit = $repo->getCommit();
		View::share('commit', substr($lastCommit->getSha(), 0, 7));
	}
}

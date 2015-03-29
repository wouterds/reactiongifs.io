<?php namespace App\Http\Controllers;

use Session;
use Request;
use Redirect;
use App\Entry;

use App\Helper\IdObfuscator;

class EntryController extends Controller {

	private $hasAccess = false;

	private function checkAccess()
	{
		$accessToken = Request::input('accessToken');

		if (empty($accessToken)) {
			$accessToken = Session::get('accessToken');
		}

		Session::put('accessToken', $accessToken);

		if ($accessToken !== '69ee50d656fb3d3935feffa97606106d4bdbbc53') {
			//return view('errors/no-access');
		}

		return false;
	}

	public function index($page = 0)
	{
		$access = $this->checkAccess();
		if ($access) {
			return $access;
		}

		$page = intval($page);

		if ($page < 1) {
			$page = 1;
		}

		$amount = 3;
		$total = ceil(Entry::count() / $amount);

		$entries = Entry::with('picture')->orderBy('published_at', 'DESC')->orderBy('id', 'ASC')->offset(($page - 1) * $amount)->take($amount)->get();

		$next = null;
		if ($page * $amount < $total) {
			$next = $page + 1;
		}

		$prev = null;
		if ($page > 1) {
			$prev = $page - 1;
		}

		$paging = [
			'current' => $page,
			'prev' => $prev,
			'next' => $next,
			'total' => $total,
		];

		return view('entry/index')->with('entries', $entries)->with('paging', $paging);
	}

	public function detailBySlug($slug)
	{
		$id = explode("-", $slug);
		$id = end($id);
		$id = intval($id);
		$slug = str_replace("-" . $id, "", $slug);
		$id = IdObfuscator::decode($id);

		$entry = Entry::with('picture')->where('id', $id)->first();

		if ($entry->slug != $slug) {
			return Redirect::to('/' . $entry->slug . '-' . $entry->encoded_id);
		}

		$prevEntry = null;//Entry::with('picture')->where('published_at', '>=', $entry->published_at)->where('id', '>', $id)->first();
		$nextEntry = null;//Entry::with('picture')->where('published_at', '<=', $entry->published_at)->where('id', '<', $id)->first();

		if ($entry) {
			return view('entry/detail')->with('entry', $entry)->with('prevEntry', $prevEntry)->with('nextEntry', $nextEntry);
		}

		return view('errors/404');
	}
}

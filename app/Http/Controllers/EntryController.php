<?php namespace App\Http\Controllers;

use Request;
use App\Entry;

use App\Helper\IdObfuscator;

class EntryController extends Controller {

	public function index()
	{
		$entries = Entry::with('picture')->orderBy('published_at', 'ASC')->paginate(3);

		return view('entry/index')->with('entries', $entries);
	}

	public function detailBySlug($slug)
	{
		$id = explode("-", $slug);
		$id = end($id);
		$id = intval($id);
		$id = IdObfuscator::decode($id);

		$entry = Entry::with('picture')->where('id', $id)->first();

		if ($entry) {
			return view('entry/detail')->with('entry', $entry);
		}

		return view('errors/404');
	}
}

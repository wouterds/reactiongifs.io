<?php namespace App\Http\Controllers;

use Request;
use App\Entry;

class EntryController extends Controller {

	public function index()
	{
		$access = Request::input('beta');

		if (!$access) {
			die('Work in progress, check back later');
		}
		
		$entries = Entry::with('picture')->orderBy('published_at', 'ASC')->paginate(3);

		return view('entry/index')->with('entries', $entries);
	}

}

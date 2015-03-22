<?php namespace App\Http\Controllers;

use Request;
use App\Entry;

class EntryController extends Controller {

	public function index()
	{
		$entries = Entry::with('picture')->paginate(3);

		return view('entry/index')->with('entries', $entries);
	}

}

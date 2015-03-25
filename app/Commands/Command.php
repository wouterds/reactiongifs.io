<?php namespace App\Commands;

abstract class Command {

	public function __construct()
	{
		DB::connection()->disableQueryLog();
	}

}

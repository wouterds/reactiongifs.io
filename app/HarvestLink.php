<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class HarvestLink extends Model {
    public function scrapeRaw()
    {
        return $this->belongsTo('App\ScrapeRaw');
    }
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ScrapeRaw extends Model {
    public function harvestLink()
    {
        return $this->hasOne('App\HarvestLink');
    }
}

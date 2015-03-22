<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model {
    public function picture()
    {
        return $this->belongsTo('App\Picture');
    }
}

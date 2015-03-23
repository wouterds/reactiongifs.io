<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Helper\IdObfuscator;

class Entry extends Model {
	protected $appends = ['encoded_id'];

    public function picture()
    {
        return $this->belongsTo('App\Picture');
    }

	public function getEncodedIdAttribute()
	{
		return IdObfuscator::encode($this->id);
	}
}

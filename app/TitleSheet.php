<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitleSheet extends Model
{
    protected $table = 'title_sheet';
	
	public function ContentSheet()
    {
        return $this->hasMany('App\ContentSheet');
    }
}

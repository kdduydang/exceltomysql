<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentSheet extends Model
{
    protected $table = 'content_sheet';
	
	protected $fillable = [
		'name',
		'serial',
		'date',
		'type',
		'quantity',
		'price',
		'total',
		'note',
		'title_sheet_id'
	];
}

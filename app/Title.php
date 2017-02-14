<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model {
	protected $table = 'titles';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description', 'state',
	];
}

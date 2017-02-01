<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderPlants extends Model {
	protected $table = 'headerPlants';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description', 'catlog_type', 'state',
	];
}

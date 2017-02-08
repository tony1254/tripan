<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model {
	protected $table = 'catalogs';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description', 'headers', 'state',
	];
}

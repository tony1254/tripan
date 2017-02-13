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
		'catalog_subId', 'code', 'name', 'description', 'state',
	];
}

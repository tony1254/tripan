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
		'name', 'description', 'catalog_type', 'catalog_id', 'state',
	];
	public function isCatalog() {
		return ($this->catlog_type == 1) ? true : false;
	}
}

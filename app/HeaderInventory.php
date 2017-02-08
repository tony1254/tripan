<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderInventory extends Model {
	protected $table = 'headerInventory';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description', 'state',
	];}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model {
	protected $table = 'forms';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description', 'headers', 'userCreator_id', 'userModifier_id', 'state',
	];
}

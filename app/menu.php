<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
	protected $table = 'menus';
	/**
	 * un menu tiene muchos permisos
	 * @return [type] [description]
	 */
	public function permissions() {
		return $this->hasMany(Permission::class);
	}
}

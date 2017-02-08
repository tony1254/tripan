<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubRodal extends Model {
	protected $table = 'subRodals';
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'objectid', //objeto en GIS
		'country', //pais
		'fund', //FOndo
		'property', //finca
		'rodal',
		'subrodal',
		'specie',
		'municipality',
		'zona', //
		'area', //nombre aldea
		'percent_clon', //porcentaje de Clon
		'surface',
		'plantation_date',
		'',
		'fores_guard',
		'pruning_date', //poda
		'roleo_date',
		'pruning_density', //densidad
		'state',
	];

	//
}

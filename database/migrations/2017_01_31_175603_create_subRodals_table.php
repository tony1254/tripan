<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubRodalsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('subRodals', function (Blueprint $table) {
			$table->increments('id');
			//otras tablas
			$table->integer('objectid')->index();
			$table->String('country');
			$table->String('fund');
			$table->integer('property');
			$table->String('rodal');
			$table->String('subrodal');
			$table->String('specie');
			// Datos de Ubicacion
			$table->String('municipality');
			$table->String('zona');
			$table->String('area');
			//datos del subRodal
			$table->integer('percent_clon'); //porcentaje de clones
			// $table->integer('updated_with'); //porcentaje de clones en inventario
			// $table->decimal('surface_gfmis', 7, 2);
			$table->decimal('surface', 7, 2);
			$table->date('plantation'); //fecha de importacion ingresada por update
			$table->String('supervisor');
			$table->String('fores_guard');

			$table->date('pruning_date'); //fecha de poda ingresada por update
			$table->date('roleo_date'); //fecha de roleo ingresada por update
			$table->integer('pruning_density'); //Ultima dencidad podada
			// $table->foreign('catalog_id')->references('id')->on('catalogs');
			// $table->integer('idMenu')->index('idMenu');
			$table->boolean('state');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('subRodals');
	}
}

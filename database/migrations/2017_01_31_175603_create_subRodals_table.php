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
			$table->String('country')->nullable();
			$table->String('fund')->nullable();
			$table->integer('property')->nullable();
			$table->String('rodal')->nullable();
			$table->String('subrodal')->nullable();
			$table->String('specie')->nullable();
			// Datos de Ubicacion
			$table->String('municipality')->nullable();
			$table->String('zona')->nullable();
			$table->String('area')->nullable();
			//datos del subRodal
			$table->integer('percent_clon')->nullable(); //porcentaje de clones
			// $table->integer('updated_with')->nullable(); //porcentaje de clones en inventario
			// $table->decimal('surface_gfmis', 7, 2)->nullable();
			$table->decimal('surface', 7, 2)->nullable();
			$table->date('plantation_date')->nullable(); //fecha de importacion ingresada por update
			$table->String('supervisor')->nullable();
			$table->String('fores_guard')->nullable();

			$table->date('pruning_date')->nullable(); //fecha de poda ingresada por update
			$table->date('raleo_date')->nullable(); //fecha de raleo ingresada por update
			$table->integer('pruning_density')->nullable(); //Ultima dencidad podada
			// $table->foreign('catalog_id')->references('id')->on('catalogs')->nullable();
			// $table->integer('idMenu')->index('idMenu')->nullable();
			$table->boolean('state')->nullable();
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

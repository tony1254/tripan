<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderPlantsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('headerPlants', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('alias');
			$table->String('description');
			// $table->foreign('catalog_id')->references('id')->on('catalogs');
			// $table->integer('idMenu')->index('idMenu');
			$table->integer('number');
			$table->integer('decimal');
			$table->boolean('catalog_type');
			$table->integer('catalog_id')->index();
			$table->boolean('state')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('headerPlants');
	}
}

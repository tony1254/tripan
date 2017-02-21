<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('parcels', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('inventory_id');
			$table->integer('number');
			$table->date('measuring_date');
			$table->integer('x');
			$table->integer('y');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('parcels');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruningsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('prunings', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('subrodal_id')->index(); //subrodal al que pertenece
			$table->date('pruning_date'); //fecha de levantamiento de poda ingresada por CRUD
			$table->decimal('height', 5, 2); // altura
			$table->integer('density'); //Ultima dencidad levantamiento de podada
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
		Schema::dropIfExists('prunings');
	}
}

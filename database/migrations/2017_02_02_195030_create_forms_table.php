<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('forms', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->string('headers');
			$table->integer('userCreator_id')->unsigned()->default(1); //->index('idUser');
			$table->foreign('userCreator_id')->references('id')->on('users');

			$table->integer('userModifier_id')->unsigned()->default(1); //->index('idUser');
			$table->foreign('userModifier_id')->references('id')->on('users');
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
		Schema::dropIfExists('forms');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('permissions', function (Blueprint $table) {
			$table->increments('id');

			$table->integer('user_id')->unsigned(); //->index('idUser');
			$table->foreign('user_id')->references('id')->on('users');

			$table->integer('menu_id')->unsigned(); //->index('idUser');
			$table->foreign('menu_id')->references('id')->on('menus');

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
		Schema::dropIfExists('permissions');
	}
}

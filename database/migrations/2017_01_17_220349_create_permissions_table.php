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
			$table->integer('idUsuario')->index('idUsuario');
			$table->integer('idMenu')->index('idMenu');
			$table->enum('state', array('active', 'disabled'));
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

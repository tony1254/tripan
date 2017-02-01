<?php

use App\Menu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Usuarios";
		$menu->save();
		$menu = new Menu;
		$menu->subId = 1;
		$menu->name = "Panel de Control";
		$menu->save();
		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Inportar";
		$menu->save();

		DB::table('users')->insert([
			[
				'name' => 'Slave',
				'email' => 'slave@slave.com',
				'password' => bcrypt('slavesalve'),
			], [
				'name' => 'Administrador',
				'email' => 'admin@admin.com',
				'password' => bcrypt('adminadmin'),
			], [
				'name' => 'tony',
				'email' => 'tony2@tony.com',
				'password' => bcrypt('tonytony'),
			], [
				'name' => 'Tripan Guatemala',
				'email' => 'tripan@tripan.com',
				'password' => bcrypt('tripan'),
			],
		]);

		createPermissions(1);
		addPermissions(1, 2);
		addPermissions(1, 3);
		addPermissions(1, 4);
		emptyPermissions(1);
		DB::table('headerPlants')->insert(
			[
				['name' => 'DAP', 'description' => 'Diametro a la altura del pecho', 'catlog_type' => '0'],
				['name' => 'HT', 'description' => 'Altura Total', 'catlog_type' => '0'],
				['name' => 'Hcom', 'description' => 'Altura comercial', 'catlog_type' => '0'],
				['name' => 'S1C', 'description' => 'calidad de la seccion 1', 'catlog_type' => '1'],
				['name' => 'S1Hs', 'description' => 'altura de la seccion 1', 'catlog_type' => '0'],
				['name' => 'S2C', 'description' => 'calidad de la seccion 2', 'catlog_type' => '1'],
				['name' => 'S2Hs', 'description' => 'altura de la seccion 2', 'catlog_type' => '0'],
				['name' => 'S3C1', 'description' => 'calidad de la seccion 3 subseccion 1', 'catlog_type' => '1'],
				['name' => 'S3Hs1', 'description' => 'altura de la seccion 3 subseccion 1', 'catlog_type' => '0'],
				['name' => 'S3C2', 'description' => 'calidad de la seccion 3 subseccion 2', 'catlog_type' => '1'],
				['name' => 'S3Hs2', 'description' => 'altura de la seccion 3 subseccion 2', 'catlog_type' => '0'],
				['name' => 'S4C1', 'description' => 'calidad de la seccion 4 subseccion 1', 'catlog_type' => '1'],
				['name' => 'S4Hs1', 'description' => 'altura de la seccion 4 subseccion 1', 'catlog_type' => '0'],
				['name' => 'S4C2', 'description' => 'calidad de la seccion 4 subseccion 2', 'catlog_type' => '1'],
				['name' => 'S4Hs2', 'description' => 'altura de la seccion 4 subseccion 2', 'catlog_type' => '0'],

				['name' => 'Origen', 'description' => 'Origen genetico de la planta ', 'catlog_type' => '1'],
				['name' => 'Roleo', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '1'],
				['name' => 'Htoc', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '0'],
				['name' => 'Hpoda', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '0'],
				['name' => 'DOS', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '0'],
				['name' => 'Vec', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '0'],
				['name' => 'P1', 'description' => 'Patogeno', 'catlog_type' => '1'],
				['name' => 'P2', 'description' => 'Patogeno', 'catlog_type' => '1'],
				['name' => 'P3', 'description' => 'Patogeno', 'catlog_type' => '1'],
				['name' => 'P4', 'description' => 'Patogeno', 'catlog_type' => '1'],
				['name' => 'P5', 'description' => 'Patogeno', 'catlog_type' => '1'],

			]);
	}
}

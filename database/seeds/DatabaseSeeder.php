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
				['name' => 'DAP', 'description' => 'Diametro a la altura del pecho', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'HT', 'description' => 'Altura Total', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'Hcom', 'description' => 'Altura comercial', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'S1C', 'description' => 'calidad de la seccion 1', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'S1Hs', 'description' => 'altura de la seccion 1', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'S2C', 'description' => 'calidad de la seccion 2', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'S2Hs', 'description' => 'altura de la seccion 2', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'S3C1', 'description' => 'calidad de la seccion 3 subseccion 1', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'S3Hs1', 'description' => 'altura de la seccion 3 subseccion 1', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'S3C2', 'description' => 'calidad de la seccion 3 subseccion 2', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'S3Hs2', 'description' => 'altura de la seccion 3 subseccion 2', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'S4C1', 'description' => 'calidad de la seccion 4 subseccion 1', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'S4Hs1', 'description' => 'altura de la seccion 4 subseccion 1', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'S4C2', 'description' => 'calidad de la seccion 4 subseccion 2', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'S4Hs2', 'description' => 'altura de la seccion 4 subseccion 2', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],

				['name' => 'Origen', 'description' => 'Origen genetico de la planta ', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'Raleo', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'Htoc', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'Hpoda', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '0', 'number' => '1', 'decimal' => '1'],
				['name' => 'DOS', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'Vec', 'description' => 'Si esta marcado para cortar ', 'catlog_type' => '0', 'number' => '2', 'decimal' => '1'],
				['name' => 'P1', 'description' => 'Patogeno', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'P2', 'description' => 'Patogeno', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'P3', 'description' => 'Patogeno', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'P4', 'description' => 'Patogeno', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'P5', 'description' => 'Patogeno', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'Forma', 'description' => 'Patogeno', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'Posicion', 'description' => 'Posicion', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'Raleo', 'description' => 'Raleo de PPM', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'CS1', 'description' => 'Codigo de Sanidad', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'CS2', 'description' => 'Codigo de Sanidad', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],
				['name' => 'Origen', 'description' => 'Origen genetico de la planta ', 'catlog_type' => '1', 'number' => '0', 'decimal' => '0'],

			]);
		DB::table('forms')->insert([
			['name' => 'Unico', 'description' => 'formulario Unico y primero existente', 'headers' => " or id = 1 or id = 2 or id = 3 or id = 4 or id = 5 or id = 6 or id = 7 or id = 8 or id = 9 or id = 10 or id = 11 or id = 12 or id = 13 or id = 14 or id = 15 or id = 16 or id = 17 or id = 18 or id = 19"],
		]);
	}
}

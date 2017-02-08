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
		$menu->name = "Ver";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 1;
		$menu->name = "Crear";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 1;
		$menu->name = "Actulizar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 1;
		$menu->name = "Eliminar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Panel de Control";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Inportar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "GFMIS";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Generador de Formualrios";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 9;
		$menu->name = "Ver";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 9;
		$menu->name = "Crear";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 9;
		$menu->name = "Actulizar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 9;
		$menu->name = "Eliminar";
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
				['name' => 'DAP', 'description' => 'Diametro a la altura del pecho', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'HT', 'description' => 'Altura Total', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'Hcom', 'description' => 'Altura comercial', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'S1C', 'description' => 'calidad de la seccion 1', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['name' => 'S1Hs', 'description' => 'altura de la seccion 1', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'S2C', 'description' => 'calidad de la seccion 2', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['name' => 'S2Hs', 'description' => 'altura de la seccion 2', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'S3C1', 'description' => 'calidad de la seccion 3 subseccion 1', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['name' => 'S3Hs1', 'description' => 'altura de la seccion 3 subseccion 1', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'S3C2', 'description' => 'calidad de la seccion 3 subseccion 2', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['name' => 'S3Hs2', 'description' => 'altura de la seccion 3 subseccion 2', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'S4C1', 'description' => 'calidad de la seccion 4 subseccion 1', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['name' => 'S4Hs1', 'description' => 'altura de la seccion 4 subseccion 1', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'S4C2', 'description' => 'calidad de la seccion 4 subseccion 2', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['name' => 'S4Hs2', 'description' => 'altura de la seccion 4 subseccion 2', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],

				['name' => 'Origen', 'description' => 'Origen genetico de la planta ', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '2'],
				['name' => 'Raleo', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '3'],
				['name' => 'Htoc', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'Hpoda', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '0', 'number' => '1', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'DOS', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'Vec', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['name' => 'P1', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['name' => 'P2', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['name' => 'P3', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['name' => 'P4', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['name' => 'P5', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['name' => 'Forma', 'description' => 'Froma', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],
				['name' => 'Posicion', 'description' => 'Posicion', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],
				['name' => 'Raleo', 'description' => 'Raleo de PPM', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],
				['name' => 'CS1', 'description' => 'Codigo de Sanidad', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],
				['name' => 'CS2', 'description' => 'Codigo de Sanidad', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],
				['name' => 'Origen', 'description' => 'Origen genetico de la planta ', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],

			]);
		DB::table('forms')->insert([
			['name' => 'Unico', 'description' => 'formulario Unico y primero existente', 'headers' => "_token', 'name', 'description', '1', '2', '3', '4', '6', '8', '10', '12', '14', '16', '17', '22', '23', '24', '25', '26', 'create'"],
		]);
		DB::table('catalogs')->insert([
			['catalog_subId' => '1', 'code' => '1', 'name' => 'calidades secciones', 'description' => 'Exportación'],
			['catalog_subId' => '1', 'code' => '2', 'name' => 'calidades secciones', 'description' => 'Mercado Nacional'],
			['catalog_subId' => '1', 'code' => '3', 'name' => 'calidades secciones', 'description' => 'Biomasa'],
			['catalog_subId' => '2', 'code' => '1', 'name' => 'origen', 'description' => 'clon'],
			['catalog_subId' => '2', 'code' => '2', 'name' => 'origen', 'description' => 'semilla'],
			['catalog_subId' => '3', 'code' => '1', 'name' => 'raleo', 'description' => 'sin marca'],
			['catalog_subId' => '3', 'code' => '2', 'name' => 'raleo', 'description' => 'marcado'],
			['catalog_subId' => '4', 'code' => '1', 'name' => 'patogenos', 'description' => 'Tronera'],
			['catalog_subId' => '4', 'code' => '2', 'name' => 'patogenos', 'description' => 'Rayo'],
			['catalog_subId' => '4', 'code' => '3', 'name' => 'patogenos', 'description' => 'Phomopsis'],
			['catalog_subId' => '4', 'code' => '4', 'name' => 'patogenos', 'description' => 'Corona de agallas'],
			['catalog_subId' => '4', 'code' => '5', 'name' => 'patogenos', 'description' => 'Termita aérea'],
			['catalog_subId' => '4', 'code' => '6', 'name' => 'patogenos', 'description' => 'Termita subterránea'],
			['catalog_subId' => '4', 'code' => '7', 'name' => 'patogenos', 'description' => 'Armillaria'],
			['catalog_subId' => '4', 'code' => '8', 'name' => 'patogenos', 'description' => 'Hyblaea'],
			['catalog_subId' => '4', 'code' => '9', 'name' => 'patogenos', 'description' => 'Gusano tanqueta'],
			['catalog_subId' => '4', 'code' => '10', 'name' => 'patogenos', 'description' => 'Saltamontes'],
			['catalog_subId' => '4', 'code' => '11', 'name' => 'patogenos', 'description' => 'Taltuza'],
			['catalog_subId' => '4', 'code' => '12', 'name' => 'patogenos', 'description' => 'Gallina ciega'],

		]);

	}
}

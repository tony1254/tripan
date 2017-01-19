<?php

use App\Menu;
use App\Permission;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
		User::create([
			'name' => 'Administrador',
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin'),
		]);
		User::create([
			'name' => 'tony',
			'email' => 'tony2@tony.com',
			'password' => bcrypt('tonytony'),
		]);
		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Usuario";
		$menu->save();
		$menu = new Menu;
		$menu->subId = 1;
		$menu->name = "Panel de Control";
		$menu->save();
		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Inportar";
		$menu->save();
		Permission::create([
			'idUser' => 2,
			'name' => Menu::find(1)->name,
			'idMenu' => 1,
			'state' => false,
		]);
		Permission::create([
			'idUser' => 2,
			'idMenu' => 2,
			'name' => Menu::find(2)->name,
			'state' => true,
		]);

	}
}

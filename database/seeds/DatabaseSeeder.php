<?php

use App\Menu;
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

		$menu = new Menu;
		$menu->subId = 0;
		$menu->nombre = "Usuario";
		$menu->save();
		$menu = new Menu;
		$menu->subId = 0;
		$menu->nombre = "Inportar";
		$menu->save();
	}
}

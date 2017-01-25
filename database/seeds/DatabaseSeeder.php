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
			],
		]);

		createPermissions(1);
		addPermissions(1, 2);
		addPermissions(1, 3);
		emptyPermissions(1);

	}
}

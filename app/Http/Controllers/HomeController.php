<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Permission;
use App\User;

// use Illuminate\Http\Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function controlPanel() {
		$permiso = new Permission([
			'name' => 'carro',
			'state' => false,
			'menu_id' => 1,
		]);
		auth()->user()->permissions()->save($permiso);
		Menu::find(3)->permissions()->save($permiso);

		return view('auth.controlPanel.permission.index')->with('permissions', Permission::all());
		return view('auth.controlPanel.index');
	}
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// return ($this->prueba());
		return view('home');
	}
	// public function prueba($value = '') {
	// 	return "hola";
	// }
	public function raiz() {
		//Session::put('permission', [1, 2, 3, 4, 5]);
		// $permission = findMenu(2);
		// exit(var_dump(findMenuName(1)->name));
		// $permissions = Permission::where('IdUser', currentUser()->id)->get();
		// $permission = $permissions->where('idMenu', 2)->first()->state;
		return view('welcome'); //->with('permissions', $permission);
	}
}

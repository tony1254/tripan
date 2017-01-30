<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller {

	public function Catalogo($value) {

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return view('auth.controlPanel.permission.index')->with('permissions', Permission::all());
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function indexTable($table) {

// Codeigo para operar En tabla plantaS
		$var = 'c,';
		$query = '
			SELECT `id`, a, `b`, ' . $var . '@h,@J
			FROM `prueba`
			WHERE 1;
			';
		$reglas = ['()**'];
		$valor = ['power()'];
		$query = str_replace($reglas, $valor, $query);
		// dd($query);
		$var = 'set @h:=1;
			set @J:=3;';
		addParameters($var); //funcino agrega parametros separados por ";"
		$a = DB::select($query);
		dd($a);
		dd(DB::table($table)->find(1));

		return view('auth.controlPanel.permission.index')->with('permissions', Permission::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		// Codigo modificaicon permiso
		$permission = Permission::find($id);
		if ($permission->state) {
			$permission->state = false;
			$state = trans('alerts.disable');
		} else {
			$permission->state = true;
			$state = trans('alerts.enable');
		}
		$permission->save();
		return view('auth.controlPanel.permission.edit')->with('msj', findMenuName($permission->menu_id) . ' ' . $state);

		return ('funciona' . findMenuName($permission->menu_id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		// Codigo modificaicon permiso
		$permission = Permission::find($id);
		if ($permission->state) {
			$permission->state = false;
		} else {
			$permission->state = true;
		}
		$permission->save();
		return ('funciona');
		// return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}

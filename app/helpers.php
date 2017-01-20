<?php
use App\Menu;
use App\Permission;
function currentUser() {
	return auth()->user();
}
function itemsMenu() {
	return $items = Permission::where('user_id', currentUser()->id)->get();
}
function findPermission($idMenu) {

	$value = Session::get('menu');
	// $permission = $permissions->where('idMenu', 2)->first()->state;
	$value = $value->where('menu_id', $idMenu)->first();
	return (isset($value)) ? $value->state : false;
}
function findMenuName($idMenu) {
	$value = Session::get('menuName');
	return $value->find($idMenu)->name;

}
function createSessionVars() {
	Session::put('permission', ['variable de sessiones']);
	Session::put('menu', itemsMenu());
	Session::put('menuName', Menu::all());
}
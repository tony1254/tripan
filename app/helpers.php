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
function addPermissions($userMasterId, $newUserId) {
	// $userMasterId = 1;
	// $newUserId = 2;
	DB::select("
			INSERT
			INTO
			  `permissions`(

			    `user_id`,
			    `menu_id`,
			    `state`,
			    `created_at`,
			    `updated_at`
			  )
			  SELECT  $newUserId, `menu_id`, `state`, `created_at`, `updated_at` FROM `permissions` WHERE `user_id`=$userMasterId");

}
function updatePermissions($userMasterId, $newUserId) {
	DB::select('
		UPDATE
		    `permissions` b, `permissions` a
		set
		    b.`state` = a.`state`
		where
		   a.`user_id` = $userMasterId
		AND
		 	 b.`user_id`= $newUserId
		AND
		 	b.`menu_id` = a.`menu_id`
		', [1]);
}
function createPermissions($newUserId) {
	DB::select('
		INSERT
			INTO
			  `permissions`(
			    `user_id`,
			    `menu_id`,
			    `state`,
			    `created_at`,
			    `updated_at`
			  )
			  SELECT  ' . $newUserId . ' , m.`id`, 1, now(),now() FROM `menus` as m  WHERE 1;
		', [1]);

}
function emptyPermissions($newUserId) {
	DB::table('permissions')
		->where('user_id', $newUserId)
		->update(array('state' => 0));
}
function fullPermissions($newUserId) {
	DB::table('permissions')
		->where('user_id', $newUserId)
		->update(array('state' => 1));
}
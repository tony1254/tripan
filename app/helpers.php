<?php
use App\Menu;
use App\Permission;
/*
obtiene el usuario acutal que inicio session
 */
/**
 * obtiene el usuario acutal que inicio session
 * @return [User] [campos de la tabla users utulizando el modelo User]
 */
function currentUser() {
	return auth()->user();
}

/**
 * obtiene los permisos que posee un Usuario
 * @return App\Permission Todos los Permisos del usuario logeado Actual
 */
function itemsMenu() {
	return $items = Permission::where('user_id', currentUser()->id)->get();
}

/**
 * Busca si en la variable se session si el usuario tiene permisos a un menu specifico
 * @param  [int] $idMenu [identificador del menu]
 * @return [bool]         [valor de logico si posee o no el permiso]
 */
function findPermission($idMenu) {

	$value = Session::get('menu');
	// $permission = $permissions->where('idMenu', 2)->first()->state;
	$value = $value->where('menu_id', $idMenu)->first();
	return (isset($value)) ? $value->state : false;
}

/**
 * buscar en la variable de sesion el nombre del Menu
 * @param  [int] $idMenu [id del menu a buscar]
 * @return [string]         [el texto del nombre buscado]
 */
function findMenuName($idMenu) {
	$value = Session::get('menuName');
	return $value->find($idMenu)->name;

}

/**
 * Crea en la session todos los valores que se necesiten
 */
function createSessionVars() {
	Session::put('permission', ['variable de sessiones']);
	Session::put('menu', itemsMenu());
	Session::put('menuName', Menu::all());
}

/**
 * Funcion Recibe Parametros separados por ";" y los inicializa antes
 * del siguiente Query que se ejecute en la BD
 * @param String $parameters [set @var:=#;]
 */
function addParameters($parameters = "") {
	$parameters = explode(';', $parameters);
	// dd($parameters);
	foreach ($parameters as $key => $value) {
		($value === "") ?: DB::statement($value);

	}
}

/**
 * Agrega Nuevo Permiso en base a otro usuario
 * @param INT $userMasterId [Id del usuario que ya posee permisos]
 * @param INT $newUserId    [Id del usuario que no posee permisos]
 */
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

/**
 * Actualiza estdo en base a otro usuario
 * @param INT $userMasterId [Id del usuario que ya posee permisos]
 * @param INT $newUserId    [Id del usuario que no posee permisos]
 */
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

/**
 * crea permisos a un usuario en base a los menus registrados
 * @param INT $newUserId    [Id del usuario que no posee permisos]
 */
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

/**
 * desactiva todos los permisos de un Usario
 * @param INT $newUserId    [Id del usuario que se quitara todos los Permisos]
 */
function emptyPermissions($newUserId) {
	DB::table('permissions')
		->where('user_id', $newUserId)
		->update(array('state' => 0));
}
/**
 * Activa todos los permisos de un usuario
 * @param INT $newUserId    [Id del usuario que se dara todos los Permisos]
 */
function fullPermissions($newUserId) {
	DB::table('permissions')
		->where('user_id', $newUserId)
		->update(array('state' => 1));
}
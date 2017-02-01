<?php
use App\HeaderPlants;
use App\Menu;
use App\Permission;
use Illuminate\Http\Request;

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
function rows($value) {
	for ($i = 0; $i < $value; $i++) {

		echo "<tr><td>&nbsp</td></tr>";
	}
}
function cols($value) {
	for ($i = 0; $i < $value; $i++) {

		echo "<td>&nbsp</td>";
	}
}
function matriz($ids) {
	$calidades = [0, 4, 6, 8, 10, 12, 14];
	$alturas = [0, 5, 7, 9, 11, 13, 15];
	$y = 30;
	$nul;
	$headersPlants = DB::select('select * from headerPlants
where
id=1
' . $ids);
	$headersPlants2 = HeaderPlants::all();
	$headersPlants3 = DB::table('headerPlants')->select('*')->get();
	$headersPlants4 = HeaderPlants::where('id', 1)->orWhere([['id', '=', '2'], ['id', '=', '2']])->get();
	// $x = count($headersPlants1);
	// dd($calidades->getName());
	// $calidad = array_search(4, $calidades);
	// dd($calidades, $calidad);

	$sections = 0;
	for ($yy = 0; $yy <= $y; $yy++) {
		if ($yy == 0) {
			$color = "text-center grey lighten-1";
			echo "<tr>";
			// for ($xx = 0; $xx <= $x; $xx++) {
			// echo var_dump(HeaderPlants::all());

			echo "<td class='$color numero' rowspan='2'>No.</td>";
			foreach ($headersPlants as $key => $xx) {
				$retVal = $xx->name;
				//si es seccion
				$calidad = array_search($xx->id, $calidades);
				//si es parte seccion
				$altura = array_search($xx->id, $alturas);
				if ($altura) {
					// dd($altura, $calidad, $calidades, $alturas, array_search(1, $calidades));
					continue;
				} else if ($calidad) {
					$sections++;
					echo "<td class='$color' colspan='2'>Seccion ";
					echo (($sections == 4)) ? ($sections - 1) . "-2" : "";
					echo (($sections == 6)) ? ($sections - 2) . "-2" : "";
					echo (($sections == 5)) ? ($sections - 1) : "";
					echo (($sections == 4) || ($sections == 5) || ($sections == 6)) ? "" : $sections;
					// echo $sections;
					echo "</td>";

				} else {
					echo (($xx->catlog_type)) ?
					"<td class='$color strech' rowspan='2'>" . $retVal . "</td>" :
					"<td class='$color'rowspan='2'>" . $retVal . "</td>";
					// echo "<td class='$color' rowspan='2'>" . $retVal . "</td>";
				}

			}

			echo "</tr>";
			echo "<tr>";
			for ($i = 0; $i < $sections; $i++) {
				echo "<td class='strech $color'>cal</td>";
				echo "<td class='$color'>altura</td>";
			}
			echo "</tr>";
			echo "<tr>";
			echo "</tr>";

		} else {
			echo "<tr>";
			$retVal = $yy;
			$color = "text-center grey lighten-1";
			echo "<td class='$color numero' >" . $retVal . "</td>";

			foreach ($headersPlants as $key => $xx) {

				$retVal = "&nbsp";
				$color = "";

				echo ($xx->catlog_type) ?
				"<td class='$color strech'>" . "&nbsp" . "</td>" :
				"<td class='$color'>" . $retVal . "</td>";

			}
			echo "</tr>";

		}
	}
}

function arrayOrs(Request $request) {

	// dd($request->all(), $request->input(6, 'default'), $request->has('8'));
	$texto = "";
	for ($i = 0; $i < 60; $i++) {
		if ($request->has($i)) {

			$texto .= " or id = " . $i;
		}
	}
	return $texto;
}
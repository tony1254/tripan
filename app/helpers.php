<?php
use App\Catalog;
use App\HeaderPlants;
use App\Menu;
use App\Permission;
use App\User;
use Illuminate\Support\Facades\DB;
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
function userName($id) {
	// dd($id);
	return User::findOrFail($id)->name;
}
function catalogItemFindFirst($value = '') {
	return Catalog::where('catalog_subId', $value)->first();
}
function catalogItemFindLast($value = '') {
	// dd(Catalog::where('catalog_subId', $value)->get());
	return Catalog::where('catalog_subId', $value)->max('code');
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
 * Funcion para crear tabulaciones en html
 * @param  integer $value [description]
 * @return [type]         [description]
 */
function tab($value = 1) {
	$out = "";
	for ($i = 0; $i < $value; $i++) {
		echo "&nbsp;";
	}
	// return $out;
}

/**
 * buscar en la variable de sesion el nombre del Menu
 * @param  [int] $idMenu [id del menu a buscar]
 * @return [string]         [el texto del nombre buscado]
 */
function findMenuName($idMenu) {
	$value = Session::get('menuName');
	$value = $value->find($idMenu);
	$value = ($value->subId > 0) ? tab(10) . "╚-»" . $value->name : $value->name;
	return $value;

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
			  SELECT  ' . $newUserId . ' , `id`, 1, now(),now() FROM `menus` as m  WHERE 1 order by `id`;
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
function cols($value, $colspan = '0') {
	for ($i = 0; $i < $value; $i++) {

		echo "<td colspan='$colspan'>&nbsp</td>";
	}
}
function isCalidad($value = '') {
	$calidades = [0, 4, 6, 8, 10, 12, 14];
	return array_search($value, $calidades);
}
function isAltura($value = '') {
	$alturas = [0, 5, 7, 9, 11, 13, 15];
	return array_search($value, $alturas);
}
function isSeccion($value = '') {
	return ((isCalidad($value)) || (isAltura($value))) ? true : false;
}
function matriz($ids) {
	$y = 30;
	$nul;
	$headersPlants = DB::select('select * from headerPlants
where
0
' . $ids);
	// $headersPlants2 = HeaderPlants::all();
	// $headersPlants3 = DB::table('headerPlants')->select('*')->get();
	// $headersPlants4 = HeaderPlants::where('id', 1)->orWhere([['id', '=', '2'], ['id', '=', '2']])->get();
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

				//si es parte seccion

				if (isAltura($xx->id)) {
					// dd($altura, $calidad, $calidades, $alturas, array_search(1, $calidades));
					continue;
				} else if (isCalidad($xx->id)) {
					$sections++;
					echo "<td class='$color strech' colspan='5'>Seccion ";
					echo seccionName($sections);
					// echo $sections;
					echo "</td>";

				} else {
					echo (($xx->catalog_type)) ?
					"<td class='$color strech' rowspan='2'>" . $retVal . "</td>" :
					"<td class='$color strech' rowspan='2' colspan='" . (1 + $xx->number + $xx->decimal) . "'>" . $retVal . "</td>";
					// echo "<td class='$color' rowspan='2'>" . $retVal . "</td>";
				}

			}

			echo "</tr>";
			echo "<tr>";
			for ($i = 0; $i < $sections; $i++) {
				echo "<td class='strech $color'>cal</td>";
				echo "<td class='strech $color' colspan='4'>altura</td>";
			}
			echo "</tr>";
			echo "<tr>";
			echo "</tr>";
//Forma cuadro fijo
		} else {
			echo "<tr>";
			$retVal = $yy;
			$color = "text-center grey lighten-1";
			echo "<td class='$color numero' >" . $retVal . "</td>";

			foreach ($headersPlants as $key => $xx) {

				$retVal = "&nbsp";
				$color = "";
				if ($xx->catalog_type) {
					echo "<td class='$color strech'>" . "&nbsp" . "</td>";

				} else {
					for ($i = 0; $i < $xx->number; $i++) {
						echo "<td class='$color strech'>" . $retVal . "</td>";
					}
					echo "<td class='$color coma text-center'><b>.</b></td>";
					for ($i = 0; $i < $xx->decimal; $i++) {
						echo "<td class='$color strech'>" . $retVal . "</td>";

					}
				}

			}
			echo "</tr>";

		}
	}
}
function seccionName($value = '') {
	$salida = "";
	$salida .= (($value == 4)) ? ($value - 1) . "-2" : "";
	$salida .= (($value == 6)) ? ($value - 2) . "-2" : "";
	$salida .= (($value == 5)) ? ($value - 1) : "";
	$salida .= (($value == 4) || ($value == 5) || ($value == 6)) ? "" : $value;
	return $salida;
}
function arrayOrs($request) {
	$texto = "";
	// dd($request, $request->all());
	// dd($request->all(), $request->input(6, 'default'), $request->has('8'));
	$request = explode("', '", $request);
	foreach ($request as $key => $value) {
		if (is_numeric($value)) {
			$texto .= " or id = " . $value;
			if (isCalidad($value)) {
				$texto .= " or id = " . ($value + 1);
				// return is_numeric($value) . " " . $value;
			}
		}

	}

	return $texto;
}
function arrayOrsSubId($request) {
	$texto = "";
	// dd($request, $request->all());
	// dd($request->all(), $request->input(6, 'default'), $request->has('8'));
	$request = explode("', '", $request);
	foreach ($request as $key => $value) {
		if (is_numeric($value)) {
			$texto .= " or catalog_subId = " . $value;
			if (isCalidad($value)) {
				$texto .= " or catalog_subId = " . ($value + 1);
				// return is_numeric($value) . " " . $value;
			}
		}

	}

	return $texto;
}
function getCatalog($value = '') {
	return HeaderPlants::findOrFail($value)->catalog_id;
}
function catalogArray($request) {
	$array = [];
	$request = explode("', '", $request);
	foreach ($request as $key => $value) {
		if (is_numeric($value)) {
			array_push($array, getCatalog($value));
		}

	}
	$catalogos = array_unique($array);
	$catalogos = implode("', '", $catalogos);
	$ids = arrayOrsSubId($catalogos);
	$headersPlants = DB::select('select * from catalogs
where
0
' . $ids);

	return $headersPlants;
}
function headersGfmisArray() {
	return [
		"orden",
		"objectid",
		"pais",
		"fondo",
		"finca",
		"rodal",
		"subrodal",
		"especie",
		"municipio",
		"zona",
		"area",
		"origen_clon",
		"sup_ha",
		"fecha_plantacion",
		"supervisor",
		"guarda_forestal",
		"fecha_ult_raleo",
		"fecha_ult_poda",
		"dencidad_ult_poda",
		"ap", //año plantacion calculado en base a la fecha de plantacion
		"edad_actual", //edad actual calculado
		"clon", //porcentage de clon del inventario
	];
}
function headersIsOn($value = '', $form) {
	$headerOld = explode("', '", $form->headers);
	return array_search($value, $headerOld);

}
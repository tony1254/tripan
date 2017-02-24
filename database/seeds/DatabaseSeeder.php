<?php

use App\HeaderPlants;
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
		$menu->name = "Ver";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 1;
		$menu->name = "Crear";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 1;
		$menu->name = "Actulizar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 1;
		$menu->name = "Eliminar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Panel de Control";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Inportar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "GFMIS";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Generador de Formualrios";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 9;
		$menu->name = "Ver";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 9;
		$menu->name = "Crear";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 9;
		$menu->name = "Actulizar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 9;
		$menu->name = "Eliminar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Catalogos";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 14;
		$menu->name = "Ver";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 14;
		$menu->name = "Crear";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 14;
		$menu->name = "Actulizar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 14;
		$menu->name = "Eliminar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Campos";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 19;
		$menu->name = "Ver";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 19;
		$menu->name = "Crear";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 19;
		$menu->name = "Actulizar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 19;
		$menu->name = "Eliminar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 0;
		$menu->name = "Titulos";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 24;
		$menu->name = "Ver";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 24;
		$menu->name = "Crear";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 24;
		$menu->name = "Actulizar";
		$menu->save();

		$menu = new Menu;
		$menu->subId = 24;
		$menu->name = "Eliminar";
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
			], [
				'name' => 'Tripan Guatemala',
				'email' => 'tripan@tripan.com',
				'password' => bcrypt('tripan'),
			],
		]);

		createPermissions(1);
		addPermissions(1, 2);
		addPermissions(1, 3);
		addPermissions(1, 4);
		emptyPermissions(1);
		DB::table('funds')->insert(
			[
				['name' => 'Chaklum', 'description' => 'Empresa Chaklum'],
				['name' => 'Ceibal', 'description' => 'Empresa Ceibal'],
			]);
		DB::table('headerPlants')->insert(
			[
				['alias' => 'DAP', 'name' => 'DAP', 'description' => 'Diametro a la altura del pecho', 'catalog_type' => '0', 'number' => '2', 'decimal' => '2', 'catalog_id' => '0'],
				['alias' => 'HT', 'name' => 'HT', 'description' => 'Altura Total', 'catalog_type' => '0', 'number' => '2', 'decimal' => '2', 'catalog_id' => '0'],
				['alias' => 'Hco', 'name' => 'Hcom', 'description' => 'Altura comercial', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'S1C', 'name' => 'S1C', 'description' => 'calidad de la seccion 1', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['alias' => 'S1Hs', 'name' => 'S1Hs', 'description' => 'altura de la seccion 1', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'S2C', 'name' => 'S2C', 'description' => 'calidad de la seccion 2', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['alias' => 'S2Hs', 'name' => 'S2Hs', 'description' => 'altura de la seccion 2', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'S3C1', 'name' => 'S3C1', 'description' => 'calidad de la seccion 3 subseccion 1', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['alias' => 'S3Hs1', 'name' => 'S3Hs1', 'description' => 'altura de la seccion 3 subseccion 1', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'S3C2', 'name' => 'S3C2', 'description' => 'calidad de la seccion 3 subseccion 2', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['alias' => 'S3Hs2', 'name' => 'S3Hs2', 'description' => 'altura de la seccion 3 subseccion 2', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'S4C1', 'name' => 'S4C1', 'description' => 'calidad de la seccion 4 subseccion 1', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['alias' => 'S4Hs1', 'name' => 'S4Hs1', 'description' => 'altura de la seccion 4 subseccion 1', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'S4C2', 'name' => 'S4C2', 'description' => 'calidad de la seccion 4 subseccion 2', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '1'],
				['alias' => 'S4Hs2', 'name' => 'S4Hs2', 'description' => 'altura de la seccion 4 subseccion 2', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],

				['alias' => 'Origen', 'name' => 'Origen', 'description' => 'Origen genetico de la planta ', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '2'],
				['alias' => 'Raleo', 'name' => 'Raleo', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '3'],
				['alias' => 'Htoc', 'name' => 'Htoc', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'Hpoda', 'name' => 'Hpoda', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '0', 'number' => '1', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'DOS', 'name' => 'DOS', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'Vec', 'name' => 'Vec', 'description' => 'Si esta marcado para cortar ', 'catalog_type' => '0', 'number' => '2', 'decimal' => '1', 'catalog_id' => '0'],
				['alias' => 'P1', 'name' => 'P1', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['alias' => 'P2', 'name' => 'P2', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['alias' => 'P3', 'name' => 'P3', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['alias' => 'P4', 'name' => 'P4', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['alias' => 'P5', 'name' => 'P5', 'description' => 'Patogeno', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '4'],
				['alias' => 'Forma', 'name' => 'Forma', 'description' => 'Froma', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],
				['alias' => 'Posicion', 'name' => 'Posicion', 'description' => 'Posicion', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],

				['alias' => 'CS1', 'name' => 'CS1', 'description' => 'Codigo de Sanidad', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],
				['alias' => 'CS2', 'name' => 'CS2', 'description' => 'Codigo de Sanidad', 'catalog_type' => '1', 'number' => '0', 'decimal' => '0', 'catalog_id' => '0'],

			]);
		Schema::table('plants', function ($table) {
			// $table->renameColumn('tony', 'to'); //cambiar el nombre
			foreach (HeaderPlants::all() as $key => $value) {

				$table->decimal($value->name, 8, 4)->nullable(); //para cerar nueva columna
			}
		});

		DB::table('forms')->insert([
			['userCreator_id' => '2', 'userModifier_id' => '2', 'name' => 'Unico', 'description' => 'formulario Unico y primero existente', 'headers' => "_token', 'name', 'description', '1', '2', '3', '4', '6', '8', '10', '12', '14', '16', '17', '22', '23', '24', '25', '26', 'create'"],
		]);
		DB::table('catalogs')->insert([
			['catalog_subId' => '1', 'code' => '1', 'name' => 'calidad de seccion', 'description' => 'Exportación'],
			['catalog_subId' => '1', 'code' => '2', 'name' => 'calidad de seccion', 'description' => 'Mercado Nacional'],
			['catalog_subId' => '1', 'code' => '3', 'name' => 'calidad de seccion', 'description' => 'Biomasa'],
			['catalog_subId' => '2', 'code' => '1', 'name' => 'origen', 'description' => 'clon'],
			['catalog_subId' => '2', 'code' => '2', 'name' => 'origen', 'description' => 'semilla'],
			['catalog_subId' => '3', 'code' => '1', 'name' => 'raleo', 'description' => 'sin marca'],
			['catalog_subId' => '3', 'code' => '2', 'name' => 'raleo', 'description' => 'marcado'],
			['catalog_subId' => '4', 'code' => '1', 'name' => 'patogenos', 'description' => 'Tronera'],
			['catalog_subId' => '4', 'code' => '2', 'name' => 'patogenos', 'description' => 'Rayo'],
			['catalog_subId' => '4', 'code' => '3', 'name' => 'patogenos', 'description' => 'Phomopsis'],
			['catalog_subId' => '4', 'code' => '4', 'name' => 'patogenos', 'description' => 'Corona de agallas'],
			['catalog_subId' => '4', 'code' => '5', 'name' => 'patogenos', 'description' => 'Termita aérea'],
			['catalog_subId' => '4', 'code' => '6', 'name' => 'patogenos', 'description' => 'Termita subterránea'],
			['catalog_subId' => '4', 'code' => '7', 'name' => 'patogenos', 'description' => 'Armillaria'],
			['catalog_subId' => '4', 'code' => '8', 'name' => 'patogenos', 'description' => 'Hyblaea'],
			['catalog_subId' => '4', 'code' => '9', 'name' => 'patogenos', 'description' => 'Gusano tanqueta'],
			['catalog_subId' => '4', 'code' => '10', 'name' => 'patogenos', 'description' => 'Saltamontes'],
			['catalog_subId' => '4', 'code' => '11', 'name' => 'patogenos', 'description' => 'Taltuza'],
			['catalog_subId' => '4', 'code' => '12', 'name' => 'patogenos', 'description' => 'Gallina ciega'],

		]);
		DB::table('titles')->insert(
			[
				//Informacion del SubRodal Sacar subRodalID
				['name' => 'pais', 'description' => 'Pais'],
				['name' => 'fondo', 'description' => 'Fondo'],
				['name' => 'finca', 'description' => 'Finca'],
				['name' => 'rodal', 'description' => 'Rodal'],
				['name' => 'subRodal', 'description' => 'subRodal'],
				['name' => 'ap', 'description' => 'Año de Plantacion'],
				//INformacion del Inventario Titulos une subRodalID con la ultima
				//Fecha de parcela  y tendria su propio ID
				['name' => 'motivo', 'description' => 'Motivo del Inventario'],
				//Informacion de la parcela- debo darle la fecha tambien
				['name' => 'parcela_id', 'description' => 'No. Parcela'],
				['name' => 'sup', 'description' => 'Sup(m2)Parcela'],
				['name' => 'x', 'description' => 'coordenada en X'],
				['name' => 'y', 'description' => 'coordenada en Y'],
				['name' => 'fecha', 'description' => 'Fecha'],
				['name' => 'responsable', 'description' => 'responsable'],

				['name' => 'bloque', 'description' => 'Bloque'],
				['name' => 'pendiente', 'description' => 'Pendiente'],
				['name' => 'exposicion', 'description' => 'Exposición'],
				['name' => 'sotobosque_ht', 'description' => 'sotobosque HT'],
				['name' => 'Sotobosque_cober', 'description' => 'sotobosque cober'],
				['name' => 'pedregosidad', 'description' => 'Pedregosidad'],
			]);
		DB::table('countries')->insert(
			[
				['continent' => 'AS', 'name' => 'Afganistán', 'iso2' => 'AF', 'iso3' => 'AFG'],
				['continent' => 'EU', 'name' => 'Albania', 'iso2' => 'AL', 'iso3' => 'ALB'],
				['continent' => 'EU', 'name' => 'Alemania', 'iso2' => 'DE', 'iso3' => 'DEU'],
				['continent' => 'EU', 'name' => 'Andorra', 'iso2' => 'AD', 'iso3' => 'AND'],
				['continent' => 'AF', 'name' => 'Angola', 'iso2' => 'AO', 'iso3' => 'AGO'],
				['continent' => 'NA', 'name' => 'Anguila', 'iso2' => 'AI', 'iso3' => 'AIA'],
				['continent' => 'AN', 'name' => 'Antártida', 'iso2' => 'AQ', 'iso3' => 'ATA'],
				['continent' => 'NA', 'name' => 'Antigua y Barbuda', 'iso2' => 'AG', 'iso3' => 'ATG'],
				['continent' => 'AS', 'name' => 'Arabia Saudita', 'iso2' => 'SA', 'iso3' => 'SAU'],
				['continent' => 'AF', 'name' => 'Argelia', 'iso2' => 'DZ', 'iso3' => 'DZA'],
				['continent' => 'SA', 'name' => 'Argentina', 'iso2' => 'AR', 'iso3' => 'ARG'],
				['continent' => 'AS', 'name' => 'Armenia', 'iso2' => 'AM', 'iso3' => 'ARM'],
				['continent' => 'NA', 'name' => 'Aruba', 'iso2' => 'AW', 'iso3' => 'ABW'],
				['continent' => 'OC', 'name' => 'Australia', 'iso2' => 'AU', 'iso3' => 'AUS'],
				['continent' => 'EU', 'name' => 'Austria', 'iso2' => 'AT', 'iso3' => 'AUT'],
				['continent' => 'AS', 'name' => 'Azerbaiyán', 'iso2' => 'AZ', 'iso3' => 'AZE'],
				['continent' => 'NA', 'name' => 'Bahamas', 'iso2' => 'BS', 'iso3' => 'BHS'],
				['continent' => 'AS', 'name' => 'Bangladés', 'iso2' => 'BD', 'iso3' => 'BGD'],
				['continent' => 'NA', 'name' => 'Barbados', 'iso2' => 'BB', 'iso3' => 'BRB'],
				['continent' => 'AS', 'name' => 'Baréin', 'iso2' => 'BH', 'iso3' => 'BHR'],
				['continent' => 'EU', 'name' => 'Bélgica', 'iso2' => 'BE', 'iso3' => 'BEL'],
				['continent' => 'NA', 'name' => 'Belice', 'iso2' => 'BZ', 'iso3' => 'BLZ'],
				['continent' => 'AF', 'name' => 'Benín', 'iso2' => 'BJ', 'iso3' => 'BEN'],
				['continent' => 'NA', 'name' => 'Bermudas', 'iso2' => 'BM', 'iso3' => 'BMU'],
				['continent' => 'EU', 'name' => 'Bielorrusia', 'iso2' => 'BY', 'iso3' => 'BLR'],
				['continent' => 'SA', 'name' => 'Bolivia, Estado Plurinacional de', 'iso2' => 'BO', 'iso3' => 'BOL'],
				['continent' => 'NA', 'name' => 'Bonaire, San Eustaquio y Saba', 'iso2' => 'BQ', 'iso3' => 'BES'],
				['continent' => 'EU', 'name' => 'Bosnia y Herzegovina', 'iso2' => 'BA', 'iso3' => 'BIH'],
				['continent' => 'AF', 'name' => 'Botsuana', 'iso2' => 'BW', 'iso3' => 'BWA'],
				['continent' => 'SA', 'name' => 'Brasil', 'iso2' => 'BR', 'iso3' => 'BRA'],
				['continent' => 'AS', 'name' => 'Brunéi Darussalam', 'iso2' => 'BN', 'iso3' => 'BRN'],
				['continent' => 'EU', 'name' => 'Bulgaria', 'iso2' => 'BG', 'iso3' => 'BGR'],
				['continent' => 'AF', 'name' => 'Burkina Faso', 'iso2' => 'BF', 'iso3' => 'BFA'],
				['continent' => 'AF', 'name' => 'Burundi', 'iso2' => 'BI', 'iso3' => 'BDI'],
				['continent' => 'AS', 'name' => 'Bután', 'iso2' => 'BT', 'iso3' => 'BTN'],
				['continent' => 'AF', 'name' => 'Cabo Verde', 'iso2' => 'CV', 'iso3' => 'CPV'],
				['continent' => 'AS', 'name' => 'Camboya', 'iso2' => 'KH', 'iso3' => 'KHM'],
				['continent' => 'AF', 'name' => 'Camerún', 'iso2' => 'CM', 'iso3' => 'CMR'],
				['continent' => 'NA', 'name' => 'Canadá', 'iso2' => 'CA', 'iso3' => 'CAN'],
				['continent' => 'AF', 'name' => 'Chad', 'iso2' => 'TD', 'iso3' => 'TCD'],
				['continent' => 'SA', 'name' => 'Chile', 'iso2' => 'CL', 'iso3' => 'CHL'],
				['continent' => 'AS', 'name' => 'China, República Popular', 'iso2' => 'CN', 'iso3' => 'CHN'],
				['continent' => 'AS', 'name' => 'Chipre', 'iso2' => 'CY', 'iso3' => 'CYP'],
				['continent' => 'SA', 'name' => 'Colombia', 'iso2' => 'CO', 'iso3' => 'COL'],
				['continent' => 'AF', 'name' => 'Comoras', 'iso2' => 'KM', 'iso3' => 'COM'],
				['continent' => 'AF', 'name' => 'Congo, La República Democrática del', 'iso2' => 'CD', 'iso3' => 'COD'],
				['continent' => 'AF', 'name' => 'Congo', 'iso2' => 'CG', 'iso3' => 'COG'],
				['continent' => 'AS', 'name' => 'Corea, República de', 'iso2' => 'KR', 'iso3' => 'KOR'],
				['continent' => 'AS', 'name' => 'Corea, República Democrática Popular de', 'iso2' => 'KP', 'iso3' => 'PRK'],
				['continent' => 'AF', 'name' => 'Costa de Marfil', 'iso2' => 'CI', 'iso3' => 'CIV'],
				['continent' => 'NA', 'name' => 'Costa Rica', 'iso2' => 'CR', 'iso3' => 'CRI'],
				['continent' => 'EU', 'name' => 'Croacia', 'iso2' => 'HR', 'iso3' => 'HRV'],
				['continent' => 'NA', 'name' => 'Cuba', 'iso2' => 'CU', 'iso3' => 'CUB'],
				['continent' => 'NA', 'name' => 'Curazao', 'iso2' => 'CW', 'iso3' => 'CUW'],
				['continent' => 'EU', 'name' => 'Dinamarca', 'iso2' => 'DK', 'iso3' => 'DNK'],
				['continent' => 'NA', 'name' => 'Dominica', 'iso2' => 'DM', 'iso3' => 'DMA'],
				['continent' => 'SA', 'name' => 'Ecuador', 'iso2' => 'EC', 'iso3' => 'ECU'],
				['continent' => 'AF', 'name' => 'Egipto', 'iso2' => 'EG', 'iso3' => 'EGY'],
				['continent' => 'NA', 'name' => 'El Salvador', 'iso2' => 'SV', 'iso3' => 'SLV'],
				['continent' => 'AS', 'name' => 'Emiratos Árabes Unidos', 'iso2' => 'AE', 'iso3' => 'ARE'],
				['continent' => 'AF', 'name' => 'Eritrea', 'iso2' => 'ER', 'iso3' => 'ERI'],
				['continent' => 'EU', 'name' => 'Eslovaquia', 'iso2' => 'SK', 'iso3' => 'SVK'],
				['continent' => 'EU', 'name' => 'Eslovenia', 'iso2' => 'SI', 'iso3' => 'SVN'],
				['continent' => 'EU', 'name' => 'España', 'iso2' => 'ES', 'iso3' => 'ESP'],
				['continent' => 'NA', 'name' => 'Estados Unidos', 'iso2' => 'US', 'iso3' => 'USA'],
				['continent' => 'EU', 'name' => 'Estonia', 'iso2' => 'EE', 'iso3' => 'EST'],
				['continent' => 'AF', 'name' => 'Etiopía', 'iso2' => 'ET', 'iso3' => 'ETH'],
				['continent' => 'EU', 'name' => 'Federacion Rusa', 'iso2' => 'RU', 'iso3' => 'RUS'],
				['continent' => 'AS', 'name' => 'Filipinas', 'iso2' => 'PH', 'iso3' => 'PHL'],
				['continent' => 'EU', 'name' => 'Finlandia', 'iso2' => 'FI', 'iso3' => 'FIN'],
				['continent' => 'OC', 'name' => 'Fiyi', 'iso2' => 'FJ', 'iso3' => 'FJI'],
				['continent' => 'EU', 'name' => 'Francia', 'iso2' => 'FR', 'iso3' => 'FRA'],
				['continent' => 'AF', 'name' => 'Gabón', 'iso2' => 'GA', 'iso3' => 'GAB'],
				['continent' => 'AF', 'name' => 'Gambia', 'iso2' => 'GM', 'iso3' => 'GMB'],
				['continent' => 'AS', 'name' => 'Georgia', 'iso2' => 'GE', 'iso3' => 'GEO'],
				['continent' => 'AF', 'name' => 'Ghana', 'iso2' => 'GH', 'iso3' => 'GHA'],
				['continent' => 'EU', 'name' => 'Gibraltar', 'iso2' => 'GI', 'iso3' => 'GIB'],
				['continent' => 'NA', 'name' => 'Granada', 'iso2' => 'GD', 'iso3' => 'GRD'],
				['continent' => 'EU', 'name' => 'Grecia', 'iso2' => 'GR', 'iso3' => 'GRC'],
				['continent' => 'NA', 'name' => 'Groenlandia', 'iso2' => 'GL', 'iso3' => 'GRL'],
				['continent' => 'NA', 'name' => 'Guadalupe', 'iso2' => 'GP', 'iso3' => 'GLP'],
				['continent' => 'OC', 'name' => 'Guam', 'iso2' => 'GU', 'iso3' => 'GUM'],
				['continent' => 'NA', 'name' => 'Guatemala', 'iso2' => 'GT', 'iso3' => 'GTM'],
				['continent' => 'SA', 'name' => 'Guayana Francesa', 'iso2' => 'GF', 'iso3' => 'GUF'],
				['continent' => 'EU', 'name' => 'Guernsey', 'iso2' => 'GG', 'iso3' => 'GGY'],
				['continent' => 'AF', 'name' => 'Guinea-Bisáu', 'iso2' => 'GW', 'iso3' => 'GNB'],
				['continent' => 'AF', 'name' => 'Guinea Ecuatorial', 'iso2' => 'GQ', 'iso3' => 'GNQ'],
				['continent' => 'AF', 'name' => 'Guinea', 'iso2' => 'GN', 'iso3' => 'GIN'],
				['continent' => 'SA', 'name' => 'Guyana', 'iso2' => 'GY', 'iso3' => 'GUY'],
				['continent' => 'NA', 'name' => 'Haití', 'iso2' => 'HT', 'iso3' => 'HTI'],
				['continent' => 'NA', 'name' => 'Honduras', 'iso2' => 'HN', 'iso3' => 'HND'],
				['continent' => 'AS', 'name' => 'Hong Kong', 'iso2' => 'HK', 'iso3' => 'HKG'],
				['continent' => 'EU', 'name' => 'Hungría', 'iso2' => 'HU', 'iso3' => 'HUN'],
				['continent' => 'AS', 'name' => 'India', 'iso2' => 'IN', 'iso3' => 'IND'],
				['continent' => 'AS', 'name' => 'Indonesia', 'iso2' => 'ID', 'iso3' => 'IDN'],
				['continent' => 'AS', 'name' => 'Irak', 'iso2' => 'IQ', 'iso3' => 'IRQ'],
				['continent' => 'AS', 'name' => 'Irán, República Islámica de', 'iso2' => 'IR', 'iso3' => 'IRN'],
				['continent' => 'EU', 'name' => 'Irlanda', 'iso2' => 'IE', 'iso3' => 'IRL'],
				['continent' => 'AN', 'name' => 'Isla Bouvet', 'iso2' => 'BV', 'iso3' => 'BVT'],
				['continent' => 'EU', 'name' => 'Isla de Man', 'iso2' => 'IM', 'iso3' => 'IMN'],
				['continent' => 'AS', 'name' => 'Isla de Navidad', 'iso2' => 'CX', 'iso3' => 'CXR'],
				['continent' => 'OC', 'name' => 'Isla Norfolk', 'iso2' => 'NF', 'iso3' => 'NFK'],
				['continent' => 'EU', 'name' => 'Islandia', 'iso2' => 'IS', 'iso3' => 'ISL'],
				['continent' => 'EU', 'name' => 'Islas Åland', 'iso2' => 'AX', 'iso3' => 'ALA'],
				['continent' => 'NA', 'name' => 'Islas Caimán', 'iso2' => 'KY', 'iso3' => 'CYM'],
				['continent' => 'AS', 'name' => 'Islas Cocos (Keeling)', 'iso2' => 'CC', 'iso3' => 'CCK'],
				['continent' => 'OC', 'name' => 'Islas Cook', 'iso2' => 'CK', 'iso3' => 'COK'],
				['continent' => 'SA', 'name' => 'Islas Falkland (Malvinas)', 'iso2' => 'FK', 'iso3' => 'FLK'],
				['continent' => 'EU', 'name' => 'Islas Feroe', 'iso2' => 'FO', 'iso3' => 'FRO'],
				['continent' => 'AN', 'name' => 'Islas Georgias del Sur y Sandwich del Sur', 'iso2' => 'GS', 'iso3' => 'SGS'],
				['continent' => 'AN', 'name' => 'Islas Heard y Mcdonald', 'iso2' => 'HM', 'iso3' => 'HMD'],
				['continent' => 'OC', 'name' => 'Islas Marianas del Norte', 'iso2' => 'MP', 'iso3' => 'MNP'],
				['continent' => 'OC', 'name' => 'Islas Marshall', 'iso2' => 'MH', 'iso3' => 'MHL'],
				['continent' => 'OC', 'name' => 'Islas Salomón', 'iso2' => 'SB', 'iso3' => 'SLB'],
				['continent' => 'NA', 'name' => 'Islas Turcas y Caicos', 'iso2' => 'TC', 'iso3' => 'TCA'],
				['continent' => 'OC', 'name' => 'Islas Ultramarinas Menores de Estados Unidos', 'iso2' => 'UM', 'iso3' => 'UMI'],
				['continent' => 'NA', 'name' => 'Islas Virgenes Británicas', 'iso2' => 'VG', 'iso3' => 'VGB'],
				['continent' => 'NA', 'name' => 'Islas Virgenes de Los Estados Unidos', 'iso2' => 'VI', 'iso3' => 'VIR'],
				['continent' => 'AS', 'name' => 'Israel', 'iso2' => 'IL', 'iso3' => 'ISR'],
				['continent' => 'EU', 'name' => 'Italia', 'iso2' => 'IT', 'iso3' => 'ITA'],
				['continent' => 'NA', 'name' => 'Jamaica', 'iso2' => 'JM', 'iso3' => 'JAM'],
				['continent' => 'AS', 'name' => 'Japón', 'iso2' => 'JP', 'iso3' => 'JPN'],
				['continent' => 'EU', 'name' => 'Jersey', 'iso2' => 'JE', 'iso3' => 'JEY'],
				['continent' => 'AS', 'name' => 'Jordania', 'iso2' => 'JO', 'iso3' => 'JOR'],
				['continent' => 'AS', 'name' => 'Kazajistán', 'iso2' => 'KZ', 'iso3' => 'KAZ'],
				['continent' => 'AF', 'name' => 'Kenia', 'iso2' => 'KE', 'iso3' => 'KEN'],
				['continent' => 'AS', 'name' => 'Kirguistán', 'iso2' => 'KG', 'iso3' => 'KGZ'],
				['continent' => 'OC', 'name' => 'Kiribati', 'iso2' => 'KI', 'iso3' => 'KIR'],
				['continent' => 'AS', 'name' => 'Kuwait', 'iso2' => 'KW', 'iso3' => 'KWT'],
				['continent' => 'AF', 'name' => 'Lesoto', 'iso2' => 'LS', 'iso3' => 'LSO'],
				['continent' => 'EU', 'name' => 'Letonia', 'iso2' => 'LV', 'iso3' => 'LVA'],
				['continent' => 'AS', 'name' => 'Líbano', 'iso2' => 'LB', 'iso3' => 'LBN'],
				['continent' => 'AF', 'name' => 'Liberia', 'iso2' => 'LR', 'iso3' => 'LBR'],
				['continent' => 'AF', 'name' => 'Libia', 'iso2' => 'LY', 'iso3' => 'LBY'],
				['continent' => 'EU', 'name' => 'Liechtenstein', 'iso2' => 'LI', 'iso3' => 'LIE'],
				['continent' => 'EU', 'name' => 'Lituania', 'iso2' => 'LT', 'iso3' => 'LTU'],
				['continent' => 'EU', 'name' => 'Luxemburgo', 'iso2' => 'LU', 'iso3' => 'LUX'],
				['continent' => 'AS', 'name' => 'Macao', 'iso2' => 'MO', 'iso3' => 'MAC'],
				['continent' => 'EU', 'name' => 'Macedonia, La Antigua República Yugoslava de', 'iso2' => 'MK', 'iso3' => 'MKD'],
				['continent' => 'AF', 'name' => 'Madagascar', 'iso2' => 'MG', 'iso3' => 'MDG'],
				['continent' => 'AS', 'name' => 'Malasia', 'iso2' => 'MY', 'iso3' => 'MYS'],
				['continent' => 'AF', 'name' => 'Malaui', 'iso2' => 'MW', 'iso3' => 'MWI'],
				['continent' => 'AS', 'name' => 'Maldivas', 'iso2' => 'MV', 'iso3' => 'MDV'],
				['continent' => 'AF', 'name' => 'Malí', 'iso2' => 'ML', 'iso3' => 'MLI'],
				['continent' => 'EU', 'name' => 'Malta', 'iso2' => 'MT', 'iso3' => 'MLT'],
				['continent' => 'AF', 'name' => 'Marruecos', 'iso2' => 'MA', 'iso3' => 'MAR'],
				['continent' => 'NA', 'name' => 'Martinica', 'iso2' => 'MQ', 'iso3' => 'MTQ'],
				['continent' => 'AF', 'name' => 'Mauricio', 'iso2' => 'MU', 'iso3' => 'MUS'],
				['continent' => 'AF', 'name' => 'Mauritania', 'iso2' => 'MR', 'iso3' => 'MRT'],
				['continent' => 'AF', 'name' => 'Mayotte', 'iso2' => 'YT', 'iso3' => 'MYT'],
				['continent' => 'NA', 'name' => 'México', 'iso2' => 'MX', 'iso3' => 'MEX'],
				['continent' => 'OC', 'name' => 'Micronesia, Estados Federados de', 'iso2' => 'FM', 'iso3' => 'FSM'],
				['continent' => 'EU', 'name' => 'Moldavia, República de', 'iso2' => 'MD', 'iso3' => 'MDA'],
				['continent' => 'EU', 'name' => 'Mónaco', 'iso2' => 'MC', 'iso3' => 'MCO'],
				['continent' => 'AS', 'name' => 'Mongolia', 'iso2' => 'MN', 'iso3' => 'MNG'],
				['continent' => 'EU', 'name' => 'Montenegro', 'iso2' => 'ME', 'iso3' => 'MNE'],
				['continent' => 'NA', 'name' => 'Montserrat', 'iso2' => 'MS', 'iso3' => 'MSR'],
				['continent' => 'AF', 'name' => 'Mozambique', 'iso2' => 'MZ', 'iso3' => 'MOZ'],
				['continent' => 'AS', 'name' => 'Myanmar', 'iso2' => 'MM', 'iso3' => 'MMR'],
				['continent' => 'AF', 'name' => 'Nabimia', 'iso2' => 'NA', 'iso3' => 'NAM'],
				['continent' => 'OC', 'name' => 'Nauru', 'iso2' => 'NR', 'iso3' => 'NRU'],
				['continent' => 'AS', 'name' => 'Nepal', 'iso2' => 'NP', 'iso3' => 'NPL'],
				['continent' => 'NA', 'name' => 'Nicaragua', 'iso2' => 'NI', 'iso3' => 'NIC'],
				['continent' => 'AF', 'name' => 'Nigeria', 'iso2' => 'NG', 'iso3' => 'NGA'],
				['continent' => 'AF', 'name' => 'Níger', 'iso2' => 'NE', 'iso3' => 'NER'],
				['continent' => 'OC', 'name' => 'Niue', 'iso2' => 'NU', 'iso3' => 'NIU'],
				['continent' => 'EU', 'name' => 'Noruega', 'iso2' => 'NO', 'iso3' => 'NOR'],
				['continent' => 'OC', 'name' => 'Nueva Caledonia', 'iso2' => 'NC', 'iso3' => 'NCL'],
				['continent' => 'OC', 'name' => 'Nueva Zelanda', 'iso2' => 'NZ', 'iso3' => 'NZL'],
				['continent' => 'AS', 'name' => 'Omán', 'iso2' => 'OM', 'iso3' => 'OMN'],
				['continent' => 'EU', 'name' => 'Países Bajos', 'iso2' => 'NL', 'iso3' => 'NLD'],
				['continent' => 'AS', 'name' => 'Pakistán', 'iso2' => 'PK', 'iso3' => 'PAK'],
				['continent' => 'OC', 'name' => 'Palaos', 'iso2' => 'PW', 'iso3' => 'PLW'],
				['continent' => 'AS', 'name' => 'Palestina, Estado de', 'iso2' => 'PS', 'iso3' => 'PSE'],
				['continent' => 'NA', 'name' => 'Panamá', 'iso2' => 'PA', 'iso3' => 'PAN'],
				['continent' => 'OC', 'name' => 'Papúa Nueva Guinea', 'iso2' => 'PG', 'iso3' => 'PNG'],
				['continent' => 'SA', 'name' => 'Paraguay', 'iso2' => 'PY', 'iso3' => 'PRY'],
				['continent' => 'SA', 'name' => 'Perú', 'iso2' => 'PE', 'iso3' => 'PER'],
				['continent' => 'OC', 'name' => 'Pitcairn', 'iso2' => 'PN', 'iso3' => 'PCN'],
				['continent' => 'OC', 'name' => 'Polinesia Francesa', 'iso2' => 'PF', 'iso3' => 'PYF'],
				['continent' => 'EU', 'name' => 'Polonia', 'iso2' => 'PL', 'iso3' => 'POL'],
				['continent' => 'EU', 'name' => 'Portugal', 'iso2' => 'PT', 'iso3' => 'PRT'],
				['continent' => 'NA', 'name' => 'Puerto Rico', 'iso2' => 'PR', 'iso3' => 'PRI'],
				['continent' => 'AS', 'name' => 'Qatar', 'iso2' => 'QA', 'iso3' => 'QAT'],
				['continent' => 'EU', 'name' => 'Reino Unido', 'iso2' => 'GB', 'iso3' => 'GBR'],
				['continent' => 'AF', 'name' => 'República Centroafricana', 'iso2' => 'CF', 'iso3' => 'CAF'],
				['continent' => 'EU', 'name' => 'República Checa', 'iso2' => 'CZ', 'iso3' => 'CZE'],
				['continent' => 'AS', 'name' => 'República Democrática Popular Lao', 'iso2' => 'LA', 'iso3' => 'LAO'],
				['continent' => 'NA', 'name' => 'República Dominicana', 'iso2' => 'DO', 'iso3' => 'DOM'],
				['continent' => 'AF', 'name' => 'Reunión', 'iso2' => 'RE', 'iso3' => 'REU'],
				['continent' => 'AF', 'name' => 'Ruanda', 'iso2' => 'RW', 'iso3' => 'RWA'],
				['continent' => 'EU', 'name' => 'Rumania', 'iso2' => 'RO', 'iso3' => 'ROU'],
				['continent' => 'AF', 'name' => 'Sahara Occidental', 'iso2' => 'EH', 'iso3' => 'ESH'],
				['continent' => 'OC', 'name' => 'Samoa Americana', 'iso2' => 'AS', 'iso3' => 'ASM'],
				['continent' => 'OC', 'name' => 'Samoa', 'iso2' => 'WS', 'iso3' => 'WSM'],
				['continent' => 'NA', 'name' => 'San Bartolomé', 'iso2' => 'BL', 'iso3' => 'BLM'],
				['continent' => 'NA', 'name' => 'San Cristóbal y Nieves', 'iso2' => 'KN', 'iso3' => 'KNA'],
				['continent' => 'EU', 'name' => 'San Marino', 'iso2' => 'SM', 'iso3' => 'SMR'],
				['continent' => 'NA', 'name' => 'San Martín (Parte Francesa)', 'iso2' => 'MF', 'iso3' => 'MAF'],
				['continent' => 'NA', 'name' => 'San Pedro y Miquelón', 'iso2' => 'PM', 'iso3' => 'SPM'],
				['continent' => 'NA', 'name' => 'San Vicente y Las Granadinas', 'iso2' => 'VC', 'iso3' => 'VCT'],
				['continent' => 'AF', 'name' => 'Santa Helena, Ascensión y Tristán de Acuña', 'iso2' => 'SH', 'iso3' => 'SHN'],
				['continent' => 'NA', 'name' => 'Santa Lucía', 'iso2' => 'LC', 'iso3' => 'LCA'],
				['continent' => 'EU', 'name' => 'Santa Sede (Ciudad Estado Vaticano)', 'iso2' => 'VA', 'iso3' => 'VAT'],
				['continent' => 'AF', 'name' => 'Santo Tomé y Principe', 'iso2' => 'ST', 'iso3' => 'STP'],
				['continent' => 'AF', 'name' => 'Senegal', 'iso2' => 'SN', 'iso3' => 'SEN'],
				['continent' => 'EU', 'name' => 'Serbia', 'iso2' => 'RS', 'iso3' => 'SRB'],
				['continent' => 'AF', 'name' => 'Seychelles', 'iso2' => 'SC', 'iso3' => 'SYC'],
				['continent' => 'AF', 'name' => 'Sierra Leona', 'iso2' => 'SL', 'iso3' => 'SLE'],
				['continent' => 'AS', 'name' => 'Singapur', 'iso2' => 'SG', 'iso3' => 'SGP'],
				['continent' => 'NA', 'name' => 'Sint Maarten (Parte Neerlandesa)', 'iso2' => 'SX', 'iso3' => 'SXM'],
				['continent' => 'AS', 'name' => 'Siria, República Arabe de', 'iso2' => 'SY', 'iso3' => 'SYR'],
				['continent' => 'AF', 'name' => 'Somalia', 'iso2' => 'SO', 'iso3' => 'SOM'],
				['continent' => 'AS', 'name' => 'Sri Lanka', 'iso2' => 'LK', 'iso3' => 'LKA'],
				['continent' => 'AF', 'name' => 'Suazilandia', 'iso2' => 'SZ', 'iso3' => 'SWZ'],
				['continent' => 'AF', 'name' => 'Sudáfrica', 'iso2' => 'ZA', 'iso3' => 'ZAF'],
				['continent' => 'AF', 'name' => 'Sudán del Sur', 'iso2' => 'SS', 'iso3' => 'SSD'],
				['continent' => 'AF', 'name' => 'Sudán', 'iso2' => 'SD', 'iso3' => 'SDN'],
				['continent' => 'EU', 'name' => 'Suecia', 'iso2' => 'SE', 'iso3' => 'SWE'],
				['continent' => 'EU', 'name' => 'Suiza', 'iso2' => 'CH', 'iso3' => 'CHE'],
				['continent' => 'SA', 'name' => 'Surinam', 'iso2' => 'SR', 'iso3' => 'SUR'],
				['continent' => 'EU', 'name' => 'Svalbard y Jan Mayen', 'iso2' => 'SJ', 'iso3' => 'SJM'],
				['continent' => 'AS', 'name' => 'Tailandia', 'iso2' => 'TH', 'iso3' => 'THA'],
				['continent' => 'AS', 'name' => 'Taiwán, Provincia de China', 'iso2' => 'TW', 'iso3' => 'TWN'],
				['continent' => 'AF', 'name' => 'Tanzania, República Unida de', 'iso2' => 'TZ', 'iso3' => 'TZA'],
				['continent' => 'AS', 'name' => 'Tayikistán', 'iso2' => 'TJ', 'iso3' => 'TJK'],
				['continent' => 'AS', 'name' => 'Territorio Británico del Océano Índico', 'iso2' => 'IO', 'iso3' => 'IOT'],
				['continent' => 'AN', 'name' => 'Territorios Australes Franceses', 'iso2' => 'TF', 'iso3' => 'ATF'],
				['continent' => 'AS', 'name' => 'Timor-Leste', 'iso2' => 'TL', 'iso3' => 'TLS'],
				['continent' => 'AF', 'name' => 'Togo', 'iso2' => 'TG', 'iso3' => 'TGO'],
				['continent' => 'OC', 'name' => 'Tokelau', 'iso2' => 'TK', 'iso3' => 'TKL'],
				['continent' => 'OC', 'name' => 'Tonga', 'iso2' => 'TO', 'iso3' => 'TON'],
				['continent' => 'NA', 'name' => 'Trinidad y Tobago', 'iso2' => 'TT', 'iso3' => 'TTO'],
				['continent' => 'AF', 'name' => 'Túnez', 'iso2' => 'TN', 'iso3' => 'TUN'],
				['continent' => 'AS', 'name' => 'Turkmenistán', 'iso2' => 'TM', 'iso3' => 'TKM'],
				['continent' => 'EU', 'name' => 'Turquía', 'iso2' => 'TR', 'iso3' => 'TUR'],
				['continent' => 'OC', 'name' => 'Tuvalu', 'iso2' => 'TV', 'iso3' => 'TUV'],
				['continent' => 'EU', 'name' => 'Ucrania', 'iso2' => 'UA', 'iso3' => 'UKR'],
				['continent' => 'AF', 'name' => 'Uganda', 'iso2' => 'UG', 'iso3' => 'UGA'],
				['continent' => 'SA', 'name' => 'Uruguay', 'iso2' => 'UY', 'iso3' => 'URY'],
				['continent' => 'AS', 'name' => 'Uzbekistán', 'iso2' => 'UZ', 'iso3' => 'UZB'],
				['continent' => 'OC', 'name' => 'Vanuatu', 'iso2' => 'VU', 'iso3' => 'VUT'],
				['continent' => 'SA', 'name' => 'Venezuela, República Bolivariana de', 'iso2' => 'VE', 'iso3' => 'VEN'],
				['continent' => 'AS', 'name' => 'Viet Nam', 'iso2' => 'VN', 'iso3' => 'VNM'],
				['continent' => 'OC', 'name' => 'Wallis y Futuna', 'iso2' => 'WF', 'iso3' => 'WLF'],
				['continent' => 'AS', 'name' => 'Yemen', 'iso2' => 'YE', 'iso3' => 'YEM'],
				['continent' => 'AF', 'name' => 'Yibuti', 'iso2' => 'DJ', 'iso3' => 'DJI'],
				['continent' => 'AF', 'name' => 'Zambia', 'iso2' => 'ZM', 'iso3' => 'ZMB'],
				['continent' => 'AF', 'name' => 'Zimbabue', 'iso2' => 'ZW', 'iso3' => 'ZWE'],

			]);
	}
}

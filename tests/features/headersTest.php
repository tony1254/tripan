<?php

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\HeaderPlants;

class HeadersTest extends FeaturesTestCase {
	public function testIndexHeaderPlant() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('HeaderPlants.index'));
		$this->see(trans('validation.attributes.name'))
			->see(trans('buttons.create'));
	}
	public function testDeleteHeaderPlant() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('HeaderPlants.index'));
		$this->see('1')
			->see("delete_1");
		$this->press("delete_1");
		$this->seeInDatabase('headerPlants', ['id' => 1, 'state' => 0]);
		//then
		$this->seePageIs(route('HeaderPlants.index'));
		$this->press("delete_1");
		$this->seeInDatabase('headerPlants', ['id' => 1, 'state' => 1]);

	}
	public function testShowHeaderPlant() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default

	}
	public function testCreateHeaderPlant() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('HeaderPlants.create'));
		$this->see(trans('validation.attributes.save'));
		//IF
		$name = "DOP";
		$alias = "DOP";
		$description = "variable muy extraña";

		$catalog_type = 1;
		$catalog_id = 1;

		$this->type($name, 'name')
			->type($alias, 'alias')
			->type($description, 'description')
			->check('catalog_type')
			->select(1, 'catalog_id')
			->press(trans('validation.attributes.save'));
		//then
		$this->seeInDatabase('headerPlants', [

			'name' => $name,
			'alias' => $alias,
			'description' => $description,
			'catalog_type' => $catalog_type,
			'catalog_id' => $catalog_id,
			'number' => 0,
			'decimal' => 0,
		]);
		return $this;
	}
	public function testEditHeaderPlant() {
		$this->testCreateHeaderPlant();
		$name = "DOP";
		$alias = "DOP";
		$description = "variable muy extraña";

		$catalog_type = 1;
		$catalog_id = 1;

		$headerPlant = HeaderPlants::where('name', $name)
			->where('alias', $alias)
			->where('description', $description)
			->first();
		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('HeaderPlants.edit', $headerPlant->id));
		$this->see($headerPlant->name);
		//IF
		$this->type($name, 'name')
			->type($alias, 'alias')
			->type($description, 'description')
			->check('catalog_type')
			->select(1, 'catalog_id')
			->press(trans('validation.attributes.save'));
		//THEN
		$this->seeInDatabase('headerPlants', [
			'id' => $headerPlant->id,
			'name' => $name,
			'alias' => $alias,
			'description' => $description,
			'catalog_type' => $catalog_type,
			'catalog_id' => $catalog_id,
			'number' => 0,
			'decimal' => 0,
		]);

	}
}
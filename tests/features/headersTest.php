<?php

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;

class headersTest extends FeaturesTestCase {
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
		$this->see(trans('buttons.save'));
	}
	public function testEditHeaderPlant() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('HeaderPlants.edit', 1));
		$this->see('DAP');

		$name = "DOP";
		$description = "variable muy extraña";

		$catalog_type = 1;
		$catalog_id = 1;

		$this->type($name, 'name')
			->type($description, 'description')
			->check('catalog_type')
			->select(1, 'catalog_id')
			->press(trans('validation.attributes.save'));
		$this->seeInDatabase('headerPlants', [
			'id' => 1,
			'name' => $name,
			'description' => $description,
			'catalog_type' => $catalog_type,
			'catalog_id' => $catalog_id,
			'number' => 0,
			'decimal' => 0,
		]);

	}
}
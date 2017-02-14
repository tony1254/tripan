<?php

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Title;

class TitleTest extends FeaturesTestCase {
	public function testIndexTitle() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('title.index'));
		$this->see(trans('validation.attributes.name'))
			->see(trans('buttons.create'));
	}
	public function testDeleteTitle() {
		$this->testCreateTitle();
		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('title.index'));
		$id = Title::first()->id;
		$this->see($id)
			->see("delete_" . $id);
		$this->press("delete_" . $id);
		$this->seeInDatabase('titles', ['id' => $id, 'state' => 0]);
		//then
		$this->seePageIs(route('title.index'));
		$this->press("delete_" . $id);
		$this->seeInDatabase('titles', ['id' => $id, 'state' => 1]);

	}
	public function testShowTitle() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default

	}
	public function testCreateTitle() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('title.create'));
		$this->see(trans('validation.attributes.save'));
		//IF

		$name = "Bloque";
		$description = "variables de algo";

		$this->type($name, 'name')
			->type($description, 'description')

			->press(trans('validation.attributes.save'));
		//then
		$this->seeInDatabase('titles', [

			'name' => $name,
			'description' => $description,

		]);
		return $this;
	}
	public function testEditTitle() {
		$this->testCreateTitle();
		$titulo = Title::first();
		$id = $titulo->id;

		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('title.edit', $id));
		$this->see($titulo->name);

		$name = "DOP";
		$description = "variable muy extraña";

		//IF
		$this->type($name, 'name')
			->type($description, 'description')
			->press(trans('validation.attributes.save'));
		//THEN
		$this->seeInDatabase('titles', [
			'id' => $id,
			'name' => $name,
			'description' => $description,

		]);

	}
}

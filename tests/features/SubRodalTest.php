<?php

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;

class SubRodalTest extends FeaturesTestCase {
	public function testIndexSubRodal() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default
		$this->visit(route('subRodal.index'));
		$this->see(trans('No.'))
			->see(trans('buttons.create'));
	}
	// public function testDeleteSubRodal() {
	// 	$this->testCreateSubRodal();
	// 	$this->actingAs($this->defaultUser()); //inicio sesion Default
	// 	$this->visit(route('subRodal.index'));
	// 	$id = SubRodal::first()->id;
	// 	$this->see($id)
	// 		->see("delete_" . $id);
	// 	$this->press("delete_" . $id);
	// 	$this->seeInDatabase('subRodals', ['id' => $id, 'state' => 0]);
	// 	//then
	// 	$this->seePageIs(route('subRodal.index'));
	// 	$this->press("delete_" . $id);
	// 	$this->seeInDatabase('subRodals', ['id' => $id, 'state' => 1]);

	// }
	// public function testShowSubRodal() {
	// 	$this->actingAs($this->defaultUser()); //inicio sesion Default

	// }
	// public function testCreateSubRodal() {
	// 	$this->actingAs($this->defaultUser()); //inicio sesion Default
	// 	$this->visit(route('subRodal.create'));
	// 	$this->see(trans('validation.attributes.save'))

	// 		->see(route('subRodal.index'));

	// 	//IF

	// 	$pais = "Guatemala";
	// 	$rodal = "2017";

	// 	$this->type($pais, 'country')
	// 		->type($rodal, 'rodal')

	// 		->press(trans('validation.attributes.save'));
	// 	//then
	// 	$this->seeInDatabase('subRodals', [

	// 		'country' => $pais,
	// 		'rodal' => $rodal,

	// 	]);
	// 	return $this;
	// }
	// public function testEditSubRodal() {
	// 	$this->testCreateSubRodal();
	// 	$titulo = SubRodal::first();
	// 	$id = $titulo->id;

	// 	$this->actingAs($this->defaultUser()); //inicio sesion Default
	// 	$this->visit(route('subRodal.edit', $id));
	// 	$this->see($titulo->name);

	// 	$name = "DOP";
	// 	$description = "variable muy extraña";

	// 	//IF
	// 	$this->type($name, 'name')
	// 		->type($description, 'description')
	// 		->press(trans('validation.attributes.save'));
	// 	//THEN
	// 	$this->seeInDatabase('subRodals', [
	// 		'id' => $id,
	// 		'name' => $name,
	// 		'description' => $description,

	// 	]);

	// }
}

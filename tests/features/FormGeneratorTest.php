<?php

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;

class FormGeneratorTest extends FeaturesTestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testSeeIndexFormGenerator() {
		$this->actingAs($this->defaultUser());
		$this->visit('/FormGenerator')
			->see(trans('buttons.create'))
			->see($this->defaultUser->name)
			->see('unico');
	}
	public function testSeeShowFormGenerator() {
		$this->actingAs($this->defaultUser());
		$this->visit('/FormGenerator/1')
			->dontSee($this->defaultUser->name)
			->see('unico');
	}
	public function testSeeEditFormGenerator() {
		$this->actingAs($this->defaultUser());
		$this->visit('/FormGenerator/1/edit')
			->see($this->defaultUser->name)
			->see('unico')
			->see(trans('validation.attributes.save'))
		;
	}
	public function testSeeCreateFormGenerator() {
		$this->actingAs($this->defaultUser());
		$this->visit('/FormGenerator/create')
			->see($this->defaultUser->name)
			->see(trans('buttons.create'))
		;
	}
	// public function testCreateNewFormGenerator() {
	// 	//if
	// 	$this->actingAs($this->defaultUser());
	// 	$this->visit('/FormGenerator/create')
	// 	// ->click(trans('buttons.create'))
	// 		->seePageIs(route('FormGenerator.create'));
	// 	//then
	// 	$name = "Nuevo";
	// 	$description = "description de Nuevo";
	// 	$this->see(trans('buttons.create'));
	// 	$this->check('1')
	// 		->check('2')
	// 		->check('3')
	// 		->type($name, 'name')
	// 		->type($description, 'description')
	// 		->press('create');
	// 	//then
	// 	$this->seePageIs(route('FormGenerator.index'));
	// 	$this->seeInDatabase('forms', ['name' => $name, 'description' => $description, 'headers' => ' or id = 1 or id = 2 or id = 3']);

	// }
}

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
		$this->visit('/generador-de-formularios')
			->see(trans('buttons.create'))
			->see($this->defaultUser->name)
			->see('unico');
	}
	public function testCreateNewFormGenerator() {
		//if
		$this->actingAs($this->defaultUser());
		$this->visit('/generador-de-formularios/create')
		// ->click(trans('buttons.create'))
			->seePageIs(route('generador-de-formularios.create'));
		//then
		$name = "Nuevo";
		$description = "description de Nuevo";
		$this->see(trans('buttons.create'));
		$this->check('1')
			->check('2')
			->check('3')
			->type($name, 'name')
			->type($description, 'description')
			->press('create');
		//then
		$this->seePageIs(route('generador-de-formularios.index'));
		$this->seeInDatabase('forms', ['name' => $name, 'description' => $description, 'headers' => ' or id = 1 or id = 2 or id = 3']);

	}
}

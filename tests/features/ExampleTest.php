<?php

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends FeaturesTestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample() {
		$name = 'Luis Garcia';
		$email = 'Luis@Garcia.com';

		$user = factory(App\User::class)->create([
			'name' => $name,
			'email' => $email,
		]);
		// $this->actingAs($this->defaultUser());//inicio sesion Default
		$this->actingAs($user); //inicio sesion especific

		$this->visit('/api/user')
		// ->see($this->defaultUser->name);
			->see($name);
		// $this->visit('/')
		// 	->see('Laravel');
	}
}

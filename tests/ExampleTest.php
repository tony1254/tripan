<?php

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase {
	use DatabaseTransactions;
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

		$this->actingAs($user, 'api');

		$this->visit('/api/user')
			->see($name);
		$this->visit('/')
			->see('Laravel');
	}
}

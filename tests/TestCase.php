<?php
use App\User;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase {
	/**
	 * The base URL to use while testing the application.
	 *
	 * @var string
	 */
	protected $baseUrl = 'http://localhost';
	/**
	 *
	 * @var  App\USer
	 */
	protected $defaultUser;
	/**
	 *
	 * @var  App\USer
	 */
	protected $specificUser;
	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication() {
		$app = require __DIR__ . '/../bootstrap/app.php';

		$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

		return $app;
	}
	public function defaultUser() {
		if ($this->defaultUser) {
			return $this->defaultUser;
		}
		return $this->defaultUser = factory(User::class)->create();
	}
	public function specificUser($name, $email, $password) {
		if ($this->specificUser) {
			return $this->specificUser;
		}
		return $this->specificUser = factory(User::class)->create([
			'name' => $name,
			'email' => $email,
			'password' => bcrypt($password),
		]);
	}
	public function specificLogin($name, $email, $password) {
		$this->visit(route('home'));
		/**
		 **sirve para Logearce con un usuario Fake
		 *	$this->actingAs($this->defaultUser());
		 **sirve para Logearce con un usuario especifico
		 *	$this->specificUser($name, $email, $password);*/

		$this->specificUser($name, $email, $password);

		$this->visit(route('login'))
			->type($email, 'email')
			->type($password, 'password')
			->press(trans('validation.attributes.login'))
		;
		$this->see($name);

	}
	public function defaultLogin() {

		$this->visit(route('home'));
		/**
		 **sirve para Logearce con un usuario Fake
		 *	$this->actingAs($this->defaultUser());
		 **sirve para Logearce con un usuario especifico
		 *	$this->specificUser($name, $email, $password);*/
		$name = 'Luis Garcia';
		$email = 'Luis@Luis.com';
		$password = 'LuisLuis';
		$this->specificUser($name, $email, $password);

		$this->visit(route('login'))
			->type($email, 'email')
			->type($password, 'password')
			->press(trans('validation.attributes.login'))
		;
		return $this->see($name);

	}
}

<?php
/**
 *
 */

class UsuarioTest extends FeaturesTestCase {
	public function testRegisterNewUser() {
		$this->visit(route('home'));
		/**
		 **sirve para Logearce con un usuario Fake
		 *	$this->actingAs($this->defaultUser());
		 **sirve para Logearce con un usuario especifico
		 *	$this->specificUser($name, $email, $password);*/
		$name = 'Tony Garcia';
		$email = 'tony@tony.com';
		$password = 'tonytony';

		$this->visit(route('register'))
			->type($name, 'name')
			->type($email, 'email')
			->type($password, 'password')
			->type($password, 'password_confirmation')
			->press(trans('validation.attributes.save'))
		;
		// $this->see('obligatorios');
		$this->seeInDatabase('users', ['name' => $name]);
		// $this->see('variable de session');

	}
	public function testCreatePermission() {
		$this->defaultLogin()
			->visit(route('permission.index'))
			->see('crear');

	}
	public function testNewLogin() {
		$this->visit(route('login'))
			->see(trans('validation.attributes.login'));
		// Se Logea
		$this->defaultLogin();

	}
}
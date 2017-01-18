<?php
/**
 *
 */
class ShowHomeTest extends FeaturesTestCase {
	public function testSeeSesionVar() {
		$this->visit(route('home'));
		// $this->actingAs($this->defaultUser());
		$name = 'tony Garcia';
		$email = 'tony@tony.com';
		$password = 'tonytony';
		$this->specificUser($name, $email, $password);
		$this->visit(route('home'))
			->type($email, 'email')
			->type($password, 'password')
			->press(trans('validation.attributes.login'))
		;
		// $this->see($this->defaultUser()->name);
		$this->see('variable de session');
		// $this->see(trans('validation.attributes.login'));
	}
	public function testSeeInMenu() {
		//Revisar si Aparece Login al estar Como invitado(Guest)
		$this->visit(url('/'))
			->see(trans('validation.attributes.login'));
		// Se Logea
		$this->defaultLogin();

		// Revisa si Muestra el Menu con su nombre
		$this->visit(url('/home'))
			->see($this->specificUser->name);

	}
	public function testdefaultLogin() {

		$this->visit(route('home'));
		/**
		 **sirve para Logearce con un usuario Fake
		 *	$this->actingAs($this->defaultUser());
		 **sirve para Logearce con un usuario especifico
		 *	$this->specificUser($name, $email, $password);*/
		$name = 'tony Garcia';
		$email = 'tony@tony.com';
		$password = 'tonytony';
		$this->specificUser($name, $email, $password);

		$this->visit(route('login'))
			->type($email, 'email')
			->type($password, 'password')
			->press(trans('validation.attributes.login'))
		;
		$this->see($name);

	}
}
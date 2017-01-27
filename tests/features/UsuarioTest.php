<?php
/**
 *
 */
use App\Permission;
use App\User;

class UsuarioTest extends FeaturesTestCase {
	public function testRegisterNewUser() {
		$this->visit(route('home'));
		/**
		 **sirve para Logearce con un usuario Fake
		 *	$this->actingAs($this->defaultUser());
		 **sirve para Logearce con un usuario especifico
		 *	$this->specificUser($name, $email, $password);*/
		$this->actingAs($this->defaultUser()); //inicio sesion Default

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
		$userNew = User::where('email', $email)->first();
		$this->seeInDatabase('users', ['name' => $name])
			->seeInDatabase('permissions', ['user_id' => $userNew->id]);
		// $this->see('variable de session');

	}
	public function testCreatePermission() {
		$this->actingAs($this->defaultUser()); //inicio sesion Default

		$this->visit(route('permission.index'))
			->see(trans('buttons.create'));

	}
	/**
	 * lee el que aparescan los usuarios en la
	 * @return [type] [description]
	 */
	public function testSeeIndexUser() {
		//inicio sesion Default
		$this->actingAs($this->defaultUser());

		$this->visit(route('user.index'))
			->see('Administrador');
	}
	public function testSeeSpecificUser() {
		//inicio sesion Default
		$this->actingAs($this->defaultUser());

		$this->visit(route('user.show', 2))
			->see('Administrador');
	}
	public function testSeeEditUser() {
		//inicio sesion Default
		$this->actingAs($this->defaultUser());
		// When
		$this->visit(route('user.edit', 2))
			->seePageIs(route('user.edit', 2));
		// Then
		$this->type('Administradores', 'name')
			->press(trans('validation.attributes.save'));
		// See
		$this->seeInDatabase('users', ['name' => 'Administradores']);
		$this->dontSeeInDatabase('users', ['name' => 'Administrador']);
		$this->seePageIs(route('user.show', 2));
	}
	public function testSeeAfterDelet() {
		//inicio sesion Default
		$this->actingAs($this->defaultUser());
		//then
		$this->visit(route('user.index'))
			->press('delete_2');
		// When
		$this->SeeInDatabase('users', ['name' => 'Administrador', 'state' => 0]);
		// $this->dontSeeInDatabase('users', ['name' => 'Administrador']);

	}
	public function testSeePermissionsInUser() {
		//inicio sesion Default
		$this->actingAs($this->defaultUser());
		//then
		$this->visit(route('user.show', 2))
			->see(trans('validation.attributes.permission'));

	}
	public function testChangePermissionInUser() {
		//inicio sesion Default
		$this->actingAs($this->defaultUser());

		$permissionTest = Permission::where('user_id', 2)->first();
		//then
		$this->visit(route('user.show', 2))
			->see('permission_4');
/*
->click('permission_' . $permissionTest->id);
// permission_4
$this->SeeInDatabase('permissions', ['id' => $permissionTest->id, 'state' => 0]);

$this->seePageIs(route('user.show', 2))
->click('permission_' . $permissionTest->id);

$this->SeeInDatabase('permissions', ['id' => $permissionTest->id, 'state' => 1]);*/

	}

}
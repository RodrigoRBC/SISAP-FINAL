<?php
App::uses('ActividadesPlane', 'Model');

/**
 * ActividadesPlane Test Case
 *
 */
class ActividadesPlaneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.actividades_plane',
		'app.actividad',
		'app.plan'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ActividadesPlane = ClassRegistry::init('ActividadesPlane');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ActividadesPlane);

		parent::tearDown();
	}

}

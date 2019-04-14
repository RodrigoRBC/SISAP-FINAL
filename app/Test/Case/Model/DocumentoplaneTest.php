<?php
App::uses('Documentoplane', 'Model');

/**
 * Documentoplane Test Case
 *
 */
class DocumentoplaneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.documentoplane',
		'app.comision',
		'app.docente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Documentoplane = ClassRegistry::init('Documentoplane');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Documentoplane);

		parent::tearDown();
	}

}

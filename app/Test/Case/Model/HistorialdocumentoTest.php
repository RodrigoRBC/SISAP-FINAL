<?php
App::uses('Historialdocumento', 'Model');

/**
 * Historialdocumento Test Case
 *
 */
class HistorialdocumentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.historialdocumento',
		'app.documento',
		'app.oficina',
		'app.secperson',
		'app.secassign',
		'app.secproject',
		'app.secorganization',
		'app.secrole',
		'app.secpassword',
		'app.cmc',
		'app.grupo',
		'app.administradore',
		'app.docente',
		'app.escuela',
		'app.facultade',
		'app.direccione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Historialdocumento = ClassRegistry::init('Historialdocumento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Historialdocumento);

		parent::tearDown();
	}

}

<?php
App::uses('Reporte', 'Model');

/**
 * Reporte Test Case
 *
 */
class ReporteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reporte',
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
		'app.direccione',
		'app.semaforo',
		'app.fdesagregada',
		'app.fgenerale',
		'app.criterio',
		'app.estandare',
		'app.factore',
		'app.dimensione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reporte = ClassRegistry::init('Reporte');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reporte);

		parent::tearDown();
	}

}

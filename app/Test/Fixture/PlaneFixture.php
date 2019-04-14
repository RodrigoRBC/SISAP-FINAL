<?php
/**
 * PlaneFixture
 *
 */
class PlaneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'fechafin' => array('type' => 'date', 'null' => true, 'default' => null),
		'fechainicial' => array('type' => 'date', 'null' => true, 'default' => null),
		'estado' => array('type' => 'string', 'null' => false, 'default' => 'AC', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'beneficiario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'comision_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_planes_beneficiarios1_idx' => array('column' => 'beneficiario_id', 'unique' => 0),
			'fk_planes_comisiones1_idx' => array('column' => 'comision_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'fechafin' => '2016-07-17',
			'fechainicial' => '2016-07-17',
			'estado' => '',
			'beneficiario_id' => 1,
			'comision_id' => 1
		),
	);

}

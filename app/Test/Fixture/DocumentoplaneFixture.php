<?php
/**
 * DocumentoplaneFixture
 *
 */
class DocumentoplaneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'fecha' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nroresolucion' => array('type' => 'date', 'null' => true, 'default' => null),
		'estado' => array('type' => 'string', 'null' => true, 'default' => 'AC', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'comision_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'docente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_docentes_has_comisiones_comisiones1_idx' => array('column' => 'comision_id', 'unique' => 0),
			'fk_docentes_has_comisiones_docentes_idx' => array('column' => 'docente_id', 'unique' => 0)
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
			'fecha' => 'Lorem ipsum dolor sit amet',
			'nroresolucion' => '2016-07-17',
			'estado' => '',
			'comision_id' => 1,
			'docente_id' => 1
		),
	);

}

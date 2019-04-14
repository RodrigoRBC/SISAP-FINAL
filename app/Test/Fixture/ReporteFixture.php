<?php
/**
 * ReporteFixture
 *
 */
class ReporteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'justificacion' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'avancetecnico' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'avanceevaluador' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'status' => array('type' => 'string', 'null' => false, 'default' => 'AC', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'secperson_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'semaforo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fdesagregada_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_reportes_fdesagregadas1' => array('column' => 'fdesagregada_id', 'unique' => 0)
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
			'justificacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'avancetecnico' => 1,
			'avanceevaluador' => 1,
			'created' => '2017-03-30 19:28:34',
			'modified' => '2017-03-30 19:28:34',
			'status' => '',
			'secperson_id' => 1,
			'semaforo_id' => 1,
			'fdesagregada_id' => 1
		),
	);

}

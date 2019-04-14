<?php
/**
 * Arbperson Fixture
 */
class ArbpersonFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'arbubigeo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'dni' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false, 'key' => 'unique'),
		'names' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 89, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'first_surname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 89, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'second_surname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 89, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'status' => array('type' => 'string', 'null' => false, 'default' => 'AC', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'dni' => array('column' => 'dni', 'unique' => 1),
			'arbubigeo_id' => array('column' => 'arbubigeo_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'arbubigeo_id' => 1,
			'dni' => 1,
			'names' => 'Lorem ipsum dolor sit amet',
			'first_surname' => 'Lorem ipsum dolor sit amet',
			'second_surname' => 'Lorem ipsum dolor sit amet',
			'status' => '',
			'created' => '2019-04-14 14:31:04',
			'modified' => '2019-04-14 14:31:04'
		),
	);

}

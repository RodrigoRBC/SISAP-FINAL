<?php
/**
 * Arbubigeo Fixture
 */
class ArbubigeoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'district' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 89, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'province' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 89, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'department' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 89, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'status' => array('type' => 'string', 'null' => false, 'default' => 'AC', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'code' => array('column' => 'code', 'unique' => 1)
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
			'code' => 'Lore',
			'district' => 'Lorem ipsum dolor sit amet',
			'province' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'status' => '',
			'created' => '2019-04-14 14:31:43',
			'modified' => '2019-04-14 14:31:43'
		),
	);

}

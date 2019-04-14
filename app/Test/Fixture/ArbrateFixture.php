<?php
/**
 * Arbrate Fixture
 */
class ArbrateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'total_cost' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '5,2', 'unsigned' => false),
		'number_of_inhabitants' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false),
		'year_and_month' => array('type' => 'string', 'null' => false, 'default' => '201901', 'length' => 6, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'monthly_rate' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '5,2', 'unsigned' => false),
		'status' => array('type' => 'string', 'null' => false, 'default' => 'AC', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'total_cost' => '',
			'number_of_inhabitants' => 1,
			'year_and_month' => 'Lore',
			'monthly_rate' => '',
			'status' => '',
			'created' => '2019-04-14 14:31:31',
			'modified' => '2019-04-14 14:31:31'
		),
	);

}

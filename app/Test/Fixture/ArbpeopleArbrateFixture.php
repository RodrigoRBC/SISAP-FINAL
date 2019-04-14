<?php
/**
 * ArbpeopleArbrate Fixture
 */
class ArbpeopleArbrateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'arbperson_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'arbrate_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'arbitration_rate' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '5,2', 'unsigned' => false),
		'payment_status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'payment_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'document' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 144, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'string', 'null' => false, 'default' => 'AC', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('arbperson_id', 'arbrate_id'), 'unique' => 1),
			'arbrate_key' => array('column' => 'arbrate_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'arbperson_id' => 1,
			'arbrate_id' => 1,
			'arbitration_rate' => '',
			'payment_status' => 'Lorem ipsum',
			'payment_date' => '2019-04-14',
			'document' => 'Lorem ipsum dolor sit amet',
			'status' => '',
			'created' => '2019-04-14 14:52:50',
			'modified' => '2019-04-14 14:52:50'
		),
	);

}

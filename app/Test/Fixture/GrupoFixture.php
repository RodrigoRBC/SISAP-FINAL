<?php
/**
 * GrupoFixture
 *
 */
class GrupoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'administrador_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'docente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'cmc_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'escuela_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'direccion_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_grupos_administradores1' => array('column' => 'administrador_id', 'unique' => 0),
			'fk_grupos_docentes1' => array('column' => 'docente_id', 'unique' => 0),
			'fk_grupos_cmcs1' => array('column' => 'cmc_id', 'unique' => 0),
			'fk_grupos_escuelas1' => array('column' => 'escuela_id', 'unique' => 0),
			'fk_grupos_direcciones1' => array('column' => 'direccion_id', 'unique' => 0)
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
			'administrador_id' => 1,
			'docente_id' => 1,
			'cmc_id' => 1,
			'escuela_id' => 1,
			'direccion_id' => 1
		),
	);

}

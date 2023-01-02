<?php
/**
 * CicloFixture
 *
 */
class CicloFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'temporada_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'fecha_inicio' => array('type' => 'date', 'null' => false, 'default' => null),
		'fecha_fin' => array('type' => 'date', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'temporadaid_idx' => array('column' => 'temporada_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'temporada_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'fecha_inicio' => '2013-02-28',
			'fecha_fin' => '2013-02-28'
		),
	);

}

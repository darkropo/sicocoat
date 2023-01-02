<?php
/**
 * EstacioneFixture
 *
 */
class EstacioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'proyecto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'ubicacion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 600, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'coordenadas' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'Proyecto_estaciones_idx' => array('column' => 'proyecto_id', 'unique' => 0)
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
			'proyecto_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'ubicacion' => 'Lorem ipsum dolor sit amet',
			'coordenadas' => 'Lorem ipsum dolor sit amet'
		),
	);

}

<?php
/**
 * CiclohasestacioneFixture
 *
 */
class CiclohasestacioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ciclos_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'estaciones_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('ciclos_id', 'estaciones_id'), 'unique' => 1),
			'fk_ciclo_has_estacion_estacion1_idx' => array('column' => 'estaciones_id', 'unique' => 0),
			'fk_ciclo_has_estacion_ciclo1_idx' => array('column' => 'ciclos_id', 'unique' => 0)
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
			'ciclos_id' => 1,
			'estaciones_id' => 1
		),
	);

}

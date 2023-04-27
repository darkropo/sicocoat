<?php
/**
 * MuestreosPm25Fixture
 *
 */
class MuestreosPm25Fixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ciclos_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'estaciones_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'numero_muestreo' => array('type' => 'integer', 'null' => false, 'default' => null),
		'fecha_montaje' => array('type' => 'date', 'null' => true, 'default' => null),
		'hora_montaje' => array('type' => 'time', 'null' => true, 'default' => null),
		'fecha_recoleccion' => array('type' => 'date', 'null' => true, 'default' => null),
		'hora_recoleccion' => array('type' => 'time', 'null' => true, 'default' => null),
		'tiempo_total' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => 'horas'),
		'flujo' => array('type' => 'float', 'null' => true, 'default' => null),
		'volumen_final' => array('type' => 'float', 'null' => true, 'default' => null),
		'microgramo' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'microgramo_metro_cubico' => array('type' => 'float', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'pm2_5_ciclos_idx' => array('column' => 'ciclos_id', 'unique' => 0),
			'pm2_5_estaciones_idx' => array('column' => 'estaciones_id', 'unique' => 0)
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
			'ciclos_id' => 1,
			'estaciones_id' => 1,
			'numero_muestreo' => 1,
			'fecha_montaje' => '2013-02-28',
			'hora_montaje' => '23:28:18',
			'fecha_recoleccion' => '2013-02-28',
			'hora_recoleccion' => '23:28:18',
			'tiempo_total' => 1,
			'flujo' => 1,
			'volumen_final' => 1,
			'microgramo' => 1,
			'microgramo_metro_cubico' => 1
		),
	);

}

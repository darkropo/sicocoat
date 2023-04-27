<?php
/**
 * MuestreosPtFixture
 *
 */
class MuestreosPtFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ciclos_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'estaciones_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'elemento_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'numero_muestreo' => array('type' => 'integer', 'null' => false, 'default' => null),
		'fecha_montaje' => array('type' => 'date', 'null' => true, 'default' => null),
		'hora_montaje' => array('type' => 'time', 'null' => true, 'default' => null),
		'fecha_recoleccion' => array('type' => 'date', 'null' => true, 'default' => null),
		'hora_recoleccion' => array('type' => 'time', 'null' => true, 'default' => null),
		'temperatura' => array('type' => 'float', 'null' => true, 'default' => null),
		'periodo_minutos' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'flujo_cr' => array('type' => 'float', 'null' => true, 'default' => null),
		'qcm' => array('type' => 'float', 'null' => true, 'default' => null),
		'volumen' => array('type' => 'float', 'null' => true, 'default' => null),
		'temperatura_inicio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'temperatura_fin' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'microgramo' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'microgramo_metro_cubico' => array('type' => 'float', 'null' => true, 'default' => null),
		'microgramo_elemento' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'microgramo_metro_cubico_elemento' => array('type' => 'float', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ciclo_muestreo_idx' => array('column' => 'ciclos_id', 'unique' => 0),
			'estacion_muestreo_idx' => array('column' => 'estaciones_id', 'unique' => 0),
			'elemento_id_idx' => array('column' => 'elemento_id', 'unique' => 0)
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
			'elemento_id' => 1,
			'numero_muestreo' => 1,
			'fecha_montaje' => '2013-02-28',
			'hora_montaje' => '23:28:26',
			'fecha_recoleccion' => '2013-02-28',
			'hora_recoleccion' => '23:28:26',
			'temperatura' => 1,
			'periodo_minutos' => 1,
			'flujo_cr' => 1,
			'qcm' => 1,
			'volumen' => 1,
			'temperatura_inicio' => 'Lorem ipsum dolor sit amet',
			'temperatura_fin' => 'Lorem ipsum dolor sit amet',
			'microgramo' => 1,
			'microgramo_metro_cubico' => 1,
			'microgramo_elemento' => 1,
			'microgramo_metro_cubico_elemento' => 1
		),
	);

}

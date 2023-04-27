<?php
/**
 * MuestreosPm10Fixture
 *
 */
class MuestreosPm10Fixture extends CakeTestFixture {

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
		'pulgadas_agua' => array('type' => 'float', 'null' => true, 'default' => null, 'comment' => 'Pulgadas de Agua\\n\\n'),
		'pulgadas_hg' => array('type' => 'float', 'null' => true, 'default' => null, 'comment' => 'Pulgadas de hg\\n\\n'),
		'p1_po_p' => array('type' => 'float', 'null' => true, 'default' => null, 'comment' => 'P1=Po-P\\n\\n\\n'),
		'p1_po' => array('type' => 'float', 'null' => true, 'default' => null, 'comment' => 'P1/Po\\n\\n'),
		'volumen' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'comment' => 'metro cubico'),
		'microgramo' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'microgramo_metro_cubico' => array('type' => 'float', 'null' => true, 'default' => null, 'comment' => 'microgramo sobre metro cubico.'),
		'microgramo_elemento' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'microgramo_metro_cubico_elemento' => array('type' => 'float', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'pm10_elemento_idx' => array('column' => 'elemento_id', 'unique' => 0),
			'pm10_ciclos_idx' => array('column' => 'ciclos_id', 'unique' => 0),
			'pm10_estaciones_idx' => array('column' => 'estaciones_id', 'unique' => 0)
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
			'hora_montaje' => '23:28:12',
			'fecha_recoleccion' => '2013-02-28',
			'hora_recoleccion' => '23:28:12',
			'pulgadas_agua' => 1,
			'pulgadas_hg' => 1,
			'p1_po_p' => 1,
			'p1_po' => 1,
			'volumen' => 1,
			'microgramo' => 1,
			'microgramo_metro_cubico' => 1,
			'microgramo_elemento' => 1,
			'microgramo_metro_cubico_elemento' => 1
		),
	);

}

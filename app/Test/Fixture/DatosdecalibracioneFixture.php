<?php
/**
 * DatosdecalibracioneFixture
 *
 */
class DatosdecalibracioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ciclos_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'estaciones_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => null),
		'temperatura' => array('type' => 'float', 'null' => false, 'default' => null),
		'lmo' => array('type' => 'float', 'null' => false, 'default' => null, 'comment' => '(pulg H2O)\\n'),
		'lro' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => '(ft³/min)\\n'),
		'qcf' => array('type' => 'float', 'null' => false, 'default' => null, 'comment' => ' (m³/min)\\n'),
		'qcm' => array('type' => 'float', 'null' => false, 'default' => null, 'comment' => '(m³/min)\\n'),
		'qcms' => array('type' => 'float', 'null' => false, 'default' => null, 'comment' => '(m³/min)\\n'),
		'responsables' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_datos_de_calibracion_ciclo1_idx' => array('column' => 'ciclos_id', 'unique' => 0),
			'fk_datos_de_calibracion_estacion1_idx' => array('column' => 'estaciones_id', 'unique' => 0)
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
			'fecha' => '2013-02-28',
			'temperatura' => 1,
			'lmo' => 1,
			'lro' => 1,
			'qcf' => 1,
			'qcm' => 1,
			'qcms' => 1,
			'responsables' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}

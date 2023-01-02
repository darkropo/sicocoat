<?php
/**
 * ValoresdatoscalibracioneFixture
 *
 */
class ValoresdatoscalibracioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'lmo' => array('type' => 'float', 'null' => false, 'default' => null, 'key' => 'primary'),
		'lro' => array('type' => 'float', 'null' => false, 'default' => null),
		'qcf' => array('type' => 'float', 'null' => false, 'default' => null),
		'qcm' => array('type' => 'float', 'null' => false, 'default' => null),
		'qcms' => array('type' => 'float', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'lmo', 'unique' => 1),
			'lmo_UNIQUE' => array('column' => 'lmo', 'unique' => 1)
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
			'lmo' => 1,
			'lro' => 1,
			'qcf' => 1,
			'qcm' => 1,
			'qcms' => 1
		),
	);

}

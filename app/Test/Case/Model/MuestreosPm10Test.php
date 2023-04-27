<?php
App::uses('MuestreosPm10', 'Model');

/**
 * MuestreosPm10 Test Case
 *
 */
class MuestreosPm10Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.muestreos_pm10',
		'app.ciclos',
		'app.estaciones',
		'app.elemento',
		'app.muestreos_pt'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MuestreosPm10 = ClassRegistry::init('MuestreosPm10');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MuestreosPm10);

		parent::tearDown();
	}

}

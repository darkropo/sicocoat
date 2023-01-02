<?php
App::uses('MuestreosPt', 'Model');

/**
 * MuestreosPt Test Case
 *
 */
class MuestreosPtTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.muestreos_pt',
		'app.ciclos',
		'app.estaciones',
		'app.elemento',
		'app.muestreos_pm10'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MuestreosPt = ClassRegistry::init('MuestreosPt');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MuestreosPt);

		parent::tearDown();
	}

}

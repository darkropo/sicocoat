<?php
App::uses('MuestreosPm25', 'Model');

/**
 * MuestreosPm25 Test Case
 *
 */
class MuestreosPm25Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.muestreos_pm25',
		'app.ciclos',
		'app.estaciones'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MuestreosPm25 = ClassRegistry::init('MuestreosPm25');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MuestreosPm25);

		parent::tearDown();
	}

}

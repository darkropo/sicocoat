<?php
App::uses('Datosdecalibracione', 'Model');

/**
 * Datosdecalibracione Test Case
 *
 */
class DatosdecalibracioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.datosdecalibracione',
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
		$this->Datosdecalibracione = ClassRegistry::init('Datosdecalibracione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Datosdecalibracione);

		parent::tearDown();
	}

}

<?php
App::uses('Valoresdatoscalibracione', 'Model');

/**
 * Valoresdatoscalibracione Test Case
 *
 */
class ValoresdatoscalibracioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.valoresdatoscalibracione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Valoresdatoscalibracione = ClassRegistry::init('Valoresdatoscalibracione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Valoresdatoscalibracione);

		parent::tearDown();
	}

}

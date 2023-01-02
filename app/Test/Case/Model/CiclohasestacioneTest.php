<?php
App::uses('Ciclohasestacione', 'Model');

/**
 * Ciclohasestacione Test Case
 *
 */
class CiclohasestacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ciclohasestacione',
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
		$this->Ciclohasestacione = ClassRegistry::init('Ciclohasestacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ciclohasestacione);

		parent::tearDown();
	}

}

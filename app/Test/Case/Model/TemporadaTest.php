<?php
App::uses('Temporada', 'Model');

/**
 * Temporada Test Case
 *
 */
class TemporadaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.temporada',
		'app.ciclo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Temporada = ClassRegistry::init('Temporada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Temporada);

		parent::tearDown();
	}

}

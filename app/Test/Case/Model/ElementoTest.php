<?php
App::uses('Elemento', 'Model');

/**
 * Elemento Test Case
 *
 */
class ElementoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.elemento',
		'app.muestreos_pm10',
		'app.muestreos_pt'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Elemento = ClassRegistry::init('Elemento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Elemento);

		parent::tearDown();
	}

}

<?php
App::uses('Politician', 'Model');

/**
 * Politician Test Case
 *
 */
class PoliticianTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.politician',
		'app.user',
		'app.group',
		'app.location',
		'app.question',
		'app.answer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Politician = ClassRegistry::init('Politician');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Politician);

		parent::tearDown();
	}

}

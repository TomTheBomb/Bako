<?php
/**
 * LocationFixture
 *
 */
class LocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'suburb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'state' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 4, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'electoral' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'postcode' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'latitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '18,12'),
		'longitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '18,12'),
		'promote' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'key' => 'index'),
		'priority' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name' => array('column' => 'name', 'unique' => 0),
			'state' => array('column' => 'state_id', 'unique' => 0),
			'promote' => array('column' => 'promote', 'unique' => 0),
			'priority' => array('column' => 'priority', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'suburb' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'electoral' => 'Lorem ipsum dolor sit amet',
			'postcode' => 1,
			'state_id' => 1,
			'latitude' => 1,
			'longitude' => 1,
			'promote' => 1,
			'priority' => 1
		),
	);

}

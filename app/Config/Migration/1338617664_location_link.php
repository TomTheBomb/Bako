<?php
class LocationLink extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'users' => array(
					'location_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index', 'after' => 'modified'),
					'indexes' => array(
						'fk_users_locations1' => array('column' => 'location_id', 'unique' => 0),
					),
				),
			),
			'drop_field' => array(
				'users' => array('postcode',),
			),
		),
		'down' => array(
			'drop_field' => array(
				'users' => array('location_id', 'indexes' => array('fk_users_locations1')),
			),
			'create_field' => array(
				'users' => array(
					'postcode' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
				),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}

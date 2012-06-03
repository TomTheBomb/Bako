<?php
class UsersUpdates extends CakeMigration {

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
			'alter_field' => array(
				'politicians' => array(
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'key' => 'index'),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'politicians' => array(
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2),
				),
			),
			'create_field' => array(
				'politicians' => array(
					'indexes' => array(
						'PRIMARY' => array(),
					),
				),
			),
			'drop_field' => array(
				'politicians' => array('', 'indexes' => array('user_id', 'PRIMARY')),
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

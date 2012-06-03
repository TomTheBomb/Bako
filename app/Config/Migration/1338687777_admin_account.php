<?php
App::uses('AuthComponent', 'Controller/Component');
class AdminAccount extends CakeMigration {

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
	    'up' => array(),
        'down' => array(),
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
		//Create admin account
        $user = ClassRegistry::init('User');
        $location = ClassRegistry::init('Location');
        $findLoc = $location->find('first');
        $data = array(
            'email' => 'admin@bako.com',
            'password' => 'ir0x',
            'group_id' => 2, // Admin
            'location_id' => $findLoc['Location']['id'],
        );
        $user->save($data);
        return true;
	}
}

<?php
class ElectorateHasManyLocation extends CakeMigration {

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
				'locations' => array(
					'electorate_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'after' => 'id'),
					'indexes' => array(
						'electorate_id' => array('column' => 'electorate_id', 'unique' => 0),
					),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'locations' => array('electorate_id', 'indexes' => array('electorate_id')),
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
        if ($direction == 'up') {
            $this->Location = ClassRegistry::init('Location');
            $this->Electorate = ClassRegistry::init('Electorate');
            $locations = $this->Location->find('all');
            $data = array();
            foreach ($locations as $location) {
                $electorate = $this->Electorate->findByName($location['Location']['electoral']);
                $data[] = array (
                    'id' => $location['Location']['id'],
                    'electorate_id' => $electorate['Electorate']['id'],
                );
            }
            $this->Location->saveMany($data);
        }
		return true;
	}
}

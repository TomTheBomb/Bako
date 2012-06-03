<?php
class Electorates extends CakeMigration {

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
			'create_table' => array(
				'electorates' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'id'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'after' => 'name'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'after' => 'created'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'electorates'
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
            $this->Electorate = ClassRegistry::init('Electorate');

            $this->Location = ClassRegistry::init('Location');
            $electorates = $this->Location->find('all', array (
                    'fields' => array (
                        'electoral',
                    ),
                    'conditions' => array (
                        'electoral !=' => '',
                    ),
                    'group' => array (
                        'electoral',
                    ),
                )
            );

            foreach ($electorates as $electorate) {
                $data[] = array(
                    'name' => $electorate['Location']['electoral']
                );
            }

            $this->Electorate->saveMany($data);
        }
		return true;
	}
}

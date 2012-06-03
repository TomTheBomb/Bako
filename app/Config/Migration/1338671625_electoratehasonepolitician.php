<?php
class ElectorateHasOnePolitician extends CakeMigration {

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
				'politicians' => array(
					'electorate_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'after' => 'user_id'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'politicians' => array('electorate_id',),
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
            $this->Politician = ClassRegistry::init('Politician');
            $this->Electorate = ClassRegistry::init('Electorate');
            $politicians = $this->Politician->find('all');
            $data = array ();
            foreach ($politicians as $politician) {
                $electorate = $this->Electorate->findByName($politician['Politician']['electorate']);
                $data[] = array (
                    'id' => $politician['Politician']['id'],
                    'electorate_id' => $electorate['Electorate']['id'],
                );
            }
            $this->Politician->saveMany($data);
        }
		return true;
	}
}

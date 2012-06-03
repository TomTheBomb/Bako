<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property User $User
 */
class Group extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    public $actsAs = array('Acl' => array('type' => 'requester'));

    /**
     * Gets the group id of "users"
     * @return integer
     */
    public function userGroupId()
    {
        $group = $this->find('first', array(
            'conditions' => array(
                'Group.name' => 'users',
            ),
        ));
        return $group['Group']['id'];
    }

    /**
     * Acl callback
     * @return null;
     */
    public function parentNode()
    {
        return null;
    }
}

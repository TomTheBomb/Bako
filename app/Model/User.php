<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 * @property Question $Question
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
                'message' => 'This field is required.',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'minLength' => array(
                'rule' => array('minLength', 4),
                'message' => 'Your password should be at least 4 characters in length.',
            ),
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
                'message' => 'This field is required.',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'email' => array(
                'rule' => array('email'),
                'message' => 'A valid email address should be used.',
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'That email is already attached to an account',
            ),
		),
        'first_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.',
            ),
        ),
        'last_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.',
            ),
        ),
        'postcode' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.',
            ),
            'minLength' => array(
                'rule' => array('minLength', 4),
                'message' => 'Your postcode should be 4 numeric values.',
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 4),
                'message' => 'Your postcode shouldn\'t be more than 4 numeric values',
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Your postcode should be 4 numeric values.',
            ),
        ),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id',
        ),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'user_id',
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

    public function beforeSave() {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

    public function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }
}

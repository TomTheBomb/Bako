<?php
App::uses('AppModel', 'Model');
/**
 * Location Model
 *
 */
class Location extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    public $belongsTo = array (
        'Electorate',
    );
    


    /**
    * Validation rules
    *
    * @var array
    */
    public $validate = array(
        'postcode' => array(
                        'rule' => 'notEmpty',
                        'message' => 'Please enter postcode or suburb within NSW.',
                        //'allowEmpty' => false,
                        //'required' => false,
                        //'last' => false, // Stop validation after this rule
                        //'on' => 'create', // Limit validation to 'create' or 'update' operations\
        ),
    );
    
    /**
     * Grabs a location from a postcode
     * @param
     *  integer - $postCode
     * @return mixed
     */
    public function findLocation($postCode) 
    {
        $location = $this->find('first', array(
            'conditions' => array(
                'postcode' => (integer) $postCode,
            ),
            'contain' => false,
        ));

        if (empty($location)) {
            return false;
        }
        return $location['Location']['id'];
    }
}

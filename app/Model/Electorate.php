<?php
App::uses('AppModel', 'Model');
/**
 * Electorate Model
 *
 */
class Electorate extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    public $hasOne = array (
        'Politician',
    );

    public $hasMany = array (
        'Location',
    );
}

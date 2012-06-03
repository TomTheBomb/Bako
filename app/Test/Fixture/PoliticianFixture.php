<?php
/**
 * PoliticianFixture
 *
 */
class PoliticianFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2),
		'initials' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 6, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'surname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 12, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'post-nominals' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 40, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'salutation' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'party' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 22, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'electorate' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 19, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministry' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 119, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_line1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 34, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_line2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 42, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_line3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 19, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_suburb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 17, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_state' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_postcode' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'contact_address_pobox_' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_pobox_suburb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 12, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_pobox_state' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_pobox_postcode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 4, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 48, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_fax' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_address_website' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_address_line1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 33, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_address_line2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_address_line3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_address_suburb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_address_state' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_address_postcode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 4, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_pobox_' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 12, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_pobox_suburb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 6, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_pobox_state' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_pobox_postcode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 4, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 39, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_fax' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ministerial_office_website' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_address_line1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_address_line2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_address_line3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_address_suburb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_address_state' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_address_postcode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 4, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_pobox_' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_pobox_suburb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_pobox_state' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_pobox_postcode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 42, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_fax' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 14, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alternative_office_website' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'office_holder' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 23, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'initials' => 'Lore',
			'surname' => 'Lorem ipsu',
			'title' => 'Lorem ',
			'post-nominals' => 'Lorem ipsum dolor sit amet',
			'salutation' => 'Lorem ipsum d',
			'party' => 'Lorem ipsum dolor si',
			'electorate' => 'Lorem ipsum dolor',
			'ministry' => 'Lorem ipsum dolor sit amet',
			'contact_address_line1' => 'Lorem ipsum dolor sit amet',
			'contact_address_line2' => 'Lorem ipsum dolor sit amet',
			'contact_address_line3' => 'Lorem ipsum dolor',
			'contact_address_suburb' => 'Lorem ipsum dol',
			'contact_address_state' => 'L',
			'contact_address_postcode' => 1,
			'contact_address_pobox_' => 'Lorem ips',
			'contact_address_pobox_suburb' => 'Lorem ipsu',
			'contact_address_pobox_state' => 'L',
			'contact_address_pobox_postcode' => 'Lo',
			'contact_address_email' => 'Lorem ipsum dolor sit amet',
			'contact_address_phone' => 'Lorem ipsum ',
			'contact_address_fax' => 'Lorem ipsum ',
			'contact_address_website' => 'Lorem ip',
			'ministerial_office_address_line1' => 'Lorem ipsum dolor sit amet',
			'ministerial_office_address_line2' => 'Lorem ipsum do',
			'ministerial_office_address_line3' => 'Lorem ipsum do',
			'ministerial_office_address_suburb' => 'Lorem ip',
			'ministerial_office_address_state' => 'L',
			'ministerial_office_address_postcode' => 'Lo',
			'ministerial_office_pobox_' => 'Lorem ipsu',
			'ministerial_office_pobox_suburb' => 'Lore',
			'ministerial_office_pobox_state' => 'L',
			'ministerial_office_pobox_postcode' => 'Lo',
			'ministerial_office_email' => 'Lorem ipsum dolor sit amet',
			'ministerial_office_phone' => 'Lorem ipsum ',
			'ministerial_office_fax' => 'Lorem ipsum ',
			'ministerial_office_website' => 'Lorem ip',
			'alternative_office_address_line1' => 'Lorem ipsum do',
			'alternative_office_address_line2' => 'Lorem ip',
			'alternative_office_address_line3' => 'Lorem ip',
			'alternative_office_address_suburb' => 'Lor',
			'alternative_office_address_state' => 'L',
			'alternative_office_address_postcode' => 'Lo',
			'alternative_office_pobox_' => 'Lorem ip',
			'alternative_office_pobox_suburb' => 'Lorem ip',
			'alternative_office_pobox_state' => 'Lorem ip',
			'alternative_office_pobox_postcode' => 'Lorem ip',
			'alternative_office_email' => 'Lorem ipsum dolor sit amet',
			'alternative_office_phone' => 'Lorem ipsum ',
			'alternative_office_fax' => 'Lorem ipsum ',
			'alternative_office_website' => 'Lorem ip',
			'office_holder' => 'Lorem ipsum dolor sit'
		),
	);

}

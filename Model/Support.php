<?php

App::uses('AppModel', 'Model');

/**
 * Support.php Model
 *
 * @author Chris Pierce <cpierce@csdurant.com>
 */
class Support extends AppModel {

	/**
	 * @var string
	 */
	public $name = 'Support';

	/**
	 * @var string
	 */
	public $displayField = 'full_name';

	/**
	 * Validation Rules
	 *
	 * @var mixed[mixed]
	 */
	public $validate = array(
		'full_name' => array(
			'rule' => array('notEmpty'),
			'message' => 'Full Name is required.',
		),
		'email' => array(
			'rule' => array('email'),
			'allowEmpty' => false,
			'message' => 'Please enter a valid email address.',
		),
	);

}
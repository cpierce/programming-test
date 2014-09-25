<?php

App::uses('AppModel', 'Model');

/**
 * Color.php Model
 *
 * @author Chris Pierce <cpierce@csdurant.com>
 */
class Color extends AppModel {

	/**
	 * @var string
	 */
	public $name = 'Color';

	/**
	 * @var string
	 */
	public $displayField = 'name';
	
	/*
	 * @var mixed[mixed]
	 */
	public $hasMany = array(
		'Vote' => array(
			'dependent' => true,
		),
	);

	/**
	 * Validation Rules
	 *
	 * @var mixed[mixed]
	 */
	public $validate = array(
		'name' => array(
			'empty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Color name is required.',
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'That color name is already added.',
			),
		),
	);

}
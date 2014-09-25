<?php

App::uses('AppModel', 'Model');

/**
 * Vote.php Model
 *
 * @author Chris Pierce <cpierce@csdurant.com>
 */
class Vote extends AppModel {

	/**
	 * @var string
	 */
	public $name = 'Vote';

	/**
	 * @var string
	 */
	public $displayField = 'city';

	/*
	 * @var mixed[mixed]
	 */
	public $belongsTo = array(
		'Color' => array(
			'counterCache' => true,
		),
	);

	/**
	 * Validation Rules
	 *
	 * @var mixed[mixed]
	 */
	public $validate = array(
		'city' => array(
			'rule' => array('notEmpty'),
			'message' => 'Name is required.',
		),
		'color_id' => array(
			'rule' => array('notEmpty'),
			'message' => 'Please select a color for your city.',
		),
		'number_of_votes' => array(
			'rule' => array('numeric'),
			'message' => 'Votes are required to be numeric.',
		),
	);

}
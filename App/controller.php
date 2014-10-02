<?php

Abstract Class Controller {

	/**
	 * @registry object
	 */
	protected $registry;

	function __construct($registry) {
		$this->registry = $registry;
	}

	/**
	 * Index Method
	 *
	 * @params void
	 * @return void
	 */
	abstract function index();

}
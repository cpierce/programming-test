<?php
App::uses('Controller','Controller');

/**
 * AppController.php Controller
 *
 * @author Chris Pierce 
 */
class AppController extends Controller {
	
	/**
	 * @var mixed[mixed]
	 */
	public $components = array(
		'Paginator',
		'Session',
	);
}
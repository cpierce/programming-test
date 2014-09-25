<?php
App::uses('AppController','Controller');

/**
 * SupportsController.php Controller
 *
 * @author Chris Pierce 
 */
class SupportsController extends AppController {
	
	/**
	 * Before Filter Method
	 */
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	/**
 	 * Admin Index Method
	 * 
	 * @params void
	 * @return void
	 */
	public function add() {
		if ($this->request->is('put') || $this->request->is('post')) {
			if ($this->Support->save($this->request->data)) {
				$this->Session->setFlash(__('Your support request has been logged'), 'flash_good');
			} else {
				$this->Session->setFlash(__('Please enter valid information to contact support'), 'flash_bad');
			}
			$this->redirect(array('admin' => false, 'controller' => 'colors', 'action' => 'index'));
		}
	}

}
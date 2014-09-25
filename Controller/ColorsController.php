<?php
App::uses('AppController','Controller');

/**
 * ColorsController.php Controller
 *
 * @author Chris Pierce 
 */
class ColorsController extends AppController {
	
	/**
	 * Before Filter Method
	 *
	 * @params void
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	/**
	 * Admin Add Method
	 *
	 * Add color from user input
	 *
	 * @params void
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('put') || $this->request->is('post')) {
			if ($this->Color->save($this->request->data)) {
				$this->Session->setFlash(__('Color added successfully.'), 'flash_good');
				$this->redirect(array('admin' => true, 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Please correct the error(s) below.'), 'flash_bad');
			}
		}
	}
	
	/**
	 * Admin Delete Method
	 *
	 * Deletes color and dependant vote associations
	 *
	 * @params int $color_id
	 * @return void
	 */
	public function admin_delete($color_id = null) {
		if (empty($color_id)) {
			throw new BadRequestException(__('No Color ID Passed'));
		}
		
		$this->Color->id = $color_id;
		if (!$this->Color->exists()) {
			throw new NotFoundException(__('Invalid Color ID Passed'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Color->delete()) {
			$this->Session->setFlash(__('Color deleted successfully.'), 'flash_good');
		} else {
			$this->Session->setFlash(__('Color was not deleted.'), 'flash_bad');
		}
		$this->redirect(array('admin' => true, 'action' => 'index'));
		
	}
	
	/**
	 * Admin Edit Method
	 *
	 * Updates color
	 *
	 * @params int $color_id
	 * @return void
	 */
	public function admin_edit($color_id = null) {
		if (empty($color_id)) {
			throw new BadRequestException(__('No Color ID Passed'));
		}
		
		$color = $this->Color->find('first', array(
			'conditions' => array(
				'Color.id' => $color_id,
			),
			'recursive' => -1,
		));
		
		if (empty($color)) {
			throw new NotFoundException(__('Invalid Color ID Passed'));
		}
		
		if ($this->request->is('put') || $this->request->is('post')) {
			if ($this->Color->save($this->request->data)) {
				$this->Session->setFlash(__('Color updated successfully.'), 'flash_good');
				$this->redirect(array('admin' => true, 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Please correct the error(s) below.'), 'flash_bad');
			}
		}
		
		if (!$this->request->data) {
			$this->request->data = $color;
		}
	}
	
	/**
 	 * Admin Index Method
	 *
	 * View colors from admin area for purpose of adding/editings/deleting
	 *
	 * @params void
	 * @return void
	 */
	public function admin_index() {
		$this->Paginator->settings = array(
			'limit' => 10,
			'order' => array(
				'Color.id' => 'asc',
			),
			'recursive' => -1,
		);
		$this->set('colors', $this->Paginator->paginate('Color'));
	}	
	
	/**
	 * Index Method
	 *
	 * View colors and additional information about colors
	 *
	 * @params void
	 * @return void
	 */
	public function index() {
		$this->loadModel('Support');
		$colors = $this->Color->find('all', array(
			'recursive' => -1,
			'order' => array(
				'Color.name' => 'asc',
			),
		));
		$this->set(compact('colors'));
	}
	
	/**
	 * View Method
	 *
	 * Ajax Call for totalling colors from color_id
	 *
	 * @params int $color_id
	 * @return void
	 */
	public function view($color_id = null) {
		$this->layout = false;
		$this->Color->Vote->virtualFields['total'] = 'IFNULL(SUM(Vote.number_of_votes),0)';
		$total = $this->Color->Vote->find('all', array(
			'fields' => array(
				'Vote.total',
			),
			'conditions' => array(
				'Vote.color_id' => $color_id,
			),
			'recursive' => -1,
		));
		echo json_encode($total[0]['Vote']);
		exit();	
	}

}
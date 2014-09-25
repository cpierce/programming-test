<?php
App::uses('AppController','Controller');

/**
 * VotesController.php Controller
 *
 * @author Chris Pierce 
 */
class VotesController extends AppController {
	
	/**
	 * Before Filter Method
	 */
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	/**
	 * Admin Add Method
	 *
	 * Add votes to database and associate them with color
	 *
	 * @params void
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('put') || $this->request->is('post')) {
			if ($this->Vote->save($this->request->data)) {
				$this->Session->setFlash(__('Vote added successfully.'), 'flash_good');
				$this->redirect(array('admin' => true, 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Please correct the error(s) below.'), 'flash_bad');
			}
		}
	
		$this->set('colors', $this->Vote->Color->find('list'));
	}
	
	/**
	 * Admin Delete Method
	 *
	 * Deletes vote
	 *
	 * @params int $vote_id
	 * @return void
	 */
	public function admin_delete($vote_id = null) {
		if (empty($vote_id)) {
			throw new BadRequestException(__('No Vote ID Passed'));
		}
		
		$this->Vote->id = $vote_id;
		if (!$this->Vote->exists()) {
			throw new NotFoundException(__('Invalid Vote ID Passed'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Vote->delete()) {
			$this->Session->setFlash(__('Vote deleted successfully.'), 'flash_good');
		} else {
			$this->Session->setFlash(__('Vote was not deleted.'), 'flash_bad');
		}
		$this->redirect(array('admin' => true, 'action' => 'index'));
		
	}
	
	/**
	 * Admin Edit Method
	 *
	 * Updates vote
	 *
	 * @params int $vote_id
	 * @return void
	 */
	public function admin_edit($vote_id = null) {
		if (empty($vote_id)) {
			throw new BadRequestException(__('No Vote ID Passed'));
		}
		
		$vote = $this->Vote->find('first', array(
			'conditions' => array(
				'Vote.id' => $vote_id,
			),
			'recursive' => -1,
		));
		
		if (empty($vote)) {
			throw new NotFoundException(__('Invalid Vote ID Passed'));
		}
		
		if ($this->request->is('put') || $this->request->is('post')) {
			if ($this->Vote->save($this->request->data)) {
				$this->Session->setFlash(__('Vote updated successfully.'), 'flash_good');
				$this->redirect(array('admin' => true, 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Please correct the error(s) below.'), 'flash_bad');
			}
		}
		
		if (!$this->request->data) {
			$this->request->data = $vote;
		}
		
		$this->set('colors', $this->Vote->Color->find('list'));		
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
		$this->Vote->Behaviors->load('Containable');
		$this->Paginator->settings = array(
			'contain' => array(
				'Color',
			),
			'limit' => 10,
			'order' => array(
				'Vote.id' => 'asc',
			),
		);
		$this->set('votes', $this->Paginator->paginate('Vote'));
	}	

}
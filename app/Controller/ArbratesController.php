<?php
App::uses('AppController', 'Controller');
/**
 * Arbrates Controller
 *
 * @property Arbrate $Arbrate
 * @property PaginatorComponent $Paginator
 */
class ArbratesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Arbrate->recursive = 0;
		$this->set('arbrates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Arbrate->exists($id)) {
			throw new NotFoundException(__('Invalid arbrate'));
		}
		$options = array('conditions' => array('Arbrate.' . $this->Arbrate->primaryKey => $id));
		$this->set('arbrate', $this->Arbrate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Arbrate->create();
			if ($this->Arbrate->save($this->request->data)) {
				$this->Flash->success(__('The arbrate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The arbrate could not be saved. Please, try again.'));
			}
		}
		$arbpeople = $this->Arbrate->Arbperson->find('list');
		$this->set(compact('arbpeople'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Arbrate->exists($id)) {
			throw new NotFoundException(__('Invalid arbrate'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Arbrate->save($this->request->data)) {
				$this->Flash->success(__('The arbrate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The arbrate could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Arbrate.' . $this->Arbrate->primaryKey => $id));
			$this->request->data = $this->Arbrate->find('first', $options);
		}
		$arbpeople = $this->Arbrate->Arbperson->find('list');
		$this->set(compact('arbpeople'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Arbrate->id = $id;
		if (!$this->Arbrate->exists()) {
			throw new NotFoundException(__('Invalid arbrate'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Arbrate->delete()) {
			$this->Flash->success(__('The arbrate has been deleted.'));
		} else {
			$this->Flash->error(__('The arbrate could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

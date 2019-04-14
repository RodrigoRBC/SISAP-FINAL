<?php
App::uses('AppController', 'Controller');
/**
 * Arbpeople Controller
 *
 * @property Arbperson $Arbperson
 * @property PaginatorComponent $Paginator
 */
class ArbpeopleController extends AppController {

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
		$this->Arbperson->recursive = 0;
		$this->set('arbpeople', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Arbperson->exists($id)) {
			throw new NotFoundException(__('Invalid arbperson'));
		}
		$options = array('conditions' => array('Arbperson.' . $this->Arbperson->primaryKey => $id));
		$this->set('arbperson', $this->Arbperson->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Arbperson->create();
			if ($this->Arbperson->save($this->request->data)) {
				$this->Flash->success(__('The arbperson has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The arbperson could not be saved. Please, try again.'));
			}
		}
		$arbubigeos = $this->Arbperson->Arbubigeo->find('list');
		$arbrates = $this->Arbperson->Arbrate->find('list');
		$this->set(compact('arbubigeos', 'arbrates'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Arbperson->exists($id)) {
			throw new NotFoundException(__('Invalid arbperson'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Arbperson->save($this->request->data)) {
				$this->Flash->success(__('The arbperson has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The arbperson could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Arbperson.' . $this->Arbperson->primaryKey => $id));
			$this->request->data = $this->Arbperson->find('first', $options);
		}
		$arbubigeos = $this->Arbperson->Arbubigeo->find('list');
		$arbrates = $this->Arbperson->Arbrate->find('list');
		$this->set(compact('arbubigeos', 'arbrates'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Arbperson->id = $id;
		if (!$this->Arbperson->exists()) {
			throw new NotFoundException(__('Invalid arbperson'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Arbperson->delete()) {
			$this->Flash->success(__('The arbperson has been deleted.'));
		} else {
			$this->Flash->error(__('The arbperson could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

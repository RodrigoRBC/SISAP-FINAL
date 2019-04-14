<?php
App::uses('AppController', 'Controller');
/**
 * ArbpeopleArbrates Controller
 *
 * @property ArbpeopleArbrate $ArbpeopleArbrate
 * @property PaginatorComponent $Paginator
 */
class ArbpeopleArbratesController extends AppController {

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
		$this->ArbpeopleArbrate->recursive = 0;
		$this->set('arbpeopleArbrates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ArbpeopleArbrate->exists($id)) {
			throw new NotFoundException(__('Invalid arbpeople arbrate'));
		}
		$options = array('conditions' => array('ArbpeopleArbrate.' . $this->ArbpeopleArbrate->primaryKey => $id));
		$this->set('arbpeopleArbrate', $this->ArbpeopleArbrate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ArbpeopleArbrate->create();
			if ($this->ArbpeopleArbrate->save($this->request->data)) {
				$this->Flash->success(__('The arbpeople arbrate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The arbpeople arbrate could not be saved. Please, try again.'));
			}
		}
		$arbpeople = $this->ArbpeopleArbrate->Arbperson->find('list');
		$arbrates = $this->ArbpeopleArbrate->Arbrate->find('list');
		$this->set(compact('arbpeople', 'arbrates'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ArbpeopleArbrate->exists($id)) {
			throw new NotFoundException(__('Invalid arbpeople arbrate'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ArbpeopleArbrate->save($this->request->data)) {
				$this->Flash->success(__('The arbpeople arbrate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The arbpeople arbrate could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ArbpeopleArbrate.' . $this->ArbpeopleArbrate->primaryKey => $id));
			$this->request->data = $this->ArbpeopleArbrate->find('first', $options);
		}
		$arbpeople = $this->ArbpeopleArbrate->Arbperson->find('list');
		$arbrates = $this->ArbpeopleArbrate->Arbrate->find('list');
		$this->set(compact('arbpeople', 'arbrates'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ArbpeopleArbrate->id = $id;
		if (!$this->ArbpeopleArbrate->exists()) {
			throw new NotFoundException(__('Invalid arbpeople arbrate'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ArbpeopleArbrate->delete()) {
			$this->Flash->success(__('The arbpeople arbrate has been deleted.'));
		} else {
			$this->Flash->error(__('The arbpeople arbrate could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

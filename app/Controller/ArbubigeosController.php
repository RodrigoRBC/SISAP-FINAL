<?php
App::uses('AppController', 'Controller');
/**
 * Arbubigeos Controller
 *
 * @property Arbubigeo $Arbubigeo
 * @property PaginatorComponent $Paginator
 */
class ArbubigeosController extends AppController {

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
		$this->Arbubigeo->recursive = 0;
		$this->set('arbubigeos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Arbubigeo->exists($id)) {
			throw new NotFoundException(__('Invalid arbubigeo'));
		}
		$options = array('conditions' => array('Arbubigeo.' . $this->Arbubigeo->primaryKey => $id));
		$this->set('arbubigeo', $this->Arbubigeo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Arbubigeo->create();
			if ($this->Arbubigeo->save($this->request->data)) {
				$this->Flash->success(__('The arbubigeo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The arbubigeo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Arbubigeo->exists($id)) {
			throw new NotFoundException(__('Invalid arbubigeo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Arbubigeo->save($this->request->data)) {
				$this->Flash->success(__('The arbubigeo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The arbubigeo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Arbubigeo.' . $this->Arbubigeo->primaryKey => $id));
			$this->request->data = $this->Arbubigeo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Arbubigeo->id = $id;
		if (!$this->Arbubigeo->exists()) {
			throw new NotFoundException(__('Invalid arbubigeo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Arbubigeo->delete()) {
			$this->Flash->success(__('The arbubigeo has been deleted.'));
		} else {
			$this->Flash->error(__('The arbubigeo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

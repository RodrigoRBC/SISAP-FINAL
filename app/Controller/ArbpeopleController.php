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
	public $helpers = array('PDF');
/**
 * index method
 *
 * @return void
 */
	// public function index() {
	// 	$this->Arbperson->recursive = 0;
	// 	$this->set('arbpeople', $this->Paginator->paginate());
	// }

	public function index($paginador=null) {

		$this->Arbperson->recursive = 0;
		$this->set('arbpeoplepublics', $this->Paginator->paginate());

		if(!empty($this->request->params['named']['page'])){
			$this->Session->write('Arbpeoplepublic.page',$this->request->params['named']['page']);
			$this->request->params['named']['page'] = $this->Session->read('Arbpeoplepublic.page');
		}

		$this->set('paginador',$paginador);

		$elementos = array(
			'Arbpeoplepublic.firstname'=>__('NOMBRES', true),
			'Arbpeoplepublic.appaterno'=>__('APELLIDO PATERNO', true),
			'Arbpeoplepublic.apmaterno'=>__('APELLIDO MATERNO', true)
		);

		$this->set('elementos',$elementos);
		if(!empty($this->params['named']['valor']) || !empty($this->params['named']['desactivo']))
		{
			$this->request->data['Buscar']['buscador'] = $this->params['named']['buscador'];
			$this->request->data['Buscar']['valor'] = $this->params['named']['valor'];
			$this->request->data['Buscar']['desactivo'] = $this->params['named']['desactivo'];
		}
		if(empty($this->request->data['Buscar']['buscador']))
			$this->request->data['Buscar']['valor'] = null;

		$valorDeBusqueda = isset($this->request->data['Buscar']['valor'])?trim($this->request->data['Buscar']['valor']):null;
		$conditions = !empty($valorDeBusqueda)?
						array($this->request->data['Buscar']['buscador'].' LIKE'=>'%'.trim($this->request->data['Buscar']['valor']).'%'):
						array();

		$conditionsActivos = (!empty($this->request->data['Buscar']['desactivo']) == 1) ?
								array('Arbperson.status'=>'DE') :
								array('Arbperson.status'=>'AC');

		$conditions = $conditions + $conditionsActivos;

		$this->paginate = array('limit' => 10,
								'page' => 1,
								'order' => array ('Arbperson.created' => 'asc'),
								'conditions' => $conditions,
								'recursive'=>1
								);

		$arbpeople=$this->paginate('Arbperson');
		$this->set(compact('arbpeople'));
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
			throw new NotFoundException(__('Persona inválido'));
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
				$this->Flash->success(__('La persona ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('La persona no pudo ser guardado. Inténtalo de nuevo.'));
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
			throw new NotFoundException(__('Persona inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Arbperson->save($this->request->data)) {
				$this->Flash->success(__('Datos de la persona ha sido modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Los datos de la persona no pudo ser modificado. Inténtalo de nuevo.'));
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
			throw new NotFoundException(__('Persona inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Arbperson->delete()) {
			$this->Flash->success(__('Los datos de la persona ha sido eliminado.'));
		} else {
			$this->Flash->error(__('Los datos de la persona no pudo ser eliminado. Inténtalo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

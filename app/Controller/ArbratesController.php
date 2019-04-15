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
	// public function index() {
	// 	$this->Arbrate->recursive = 0;
	// 	$this->set('arbrates', $this->Paginator->paginate());
	// }

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index($paginador=null) {

		$this->Arbrate->recursive = 0;
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
								array('Arbrate.status'=>'DE') :
								array('Arbrate.status'=>'AC');

		$conditions = $conditions + $conditionsActivos;

		$this->paginate = array('limit' => 10,
								'page' => 1,
								'order' => array ('Arbrate.created' => 'asc'),
								'conditions' => $conditions,
								'recursive'=>1
								);

		$arbrates=$this->paginate('Arbrate');
		$this->set(compact('arbrates'));
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
			throw new NotFoundException(__('Tasa inválido'));
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
				$this->Flash->success(__('La tasa ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('La tasa no pudo ser guardado. Inténtalo de nuevo.'));
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
			throw new NotFoundException(__('Tasa inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Arbrate->save($this->request->data)) {
				$this->Flash->success(__('La tasa ha sido modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('La tasa no pudo ser modificado. Inténtalo de nuevo.'));
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
			throw new NotFoundException(__('Tasa inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Arbrate->delete()) {
			$this->Flash->success(__('La tasa ha sido eliminado.'));
		} else {
			$this->Flash->error(__('El tasa no pudo ser eliminado. Inténtalo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

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
	// public function index() {
	// 	$this->Arbubigeo->recursive = 0;
	// 	$this->set('arbubigeos', $this->Paginator->paginate());
	// }
/**
 * index method
 *
 * @return void
 */
	public function index($paginador=null) {

		$this->Arbubigeo->recursive = 0;
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
								array('Arbubigeo.status'=>'DE') :
								array('Arbubigeo.status'=>'AC');

		$conditions = $conditions + $conditionsActivos;

		$this->paginate = array('limit' => 10,
								'page' => 1,
								'order' => array ('Arbubigeo.created' => 'asc'),
								'conditions' => $conditions,
								'recursive'=>1
								);

		$arbubigeos=$this->paginate('Arbubigeo');
		$this->set(compact('arbubigeos'));
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
			throw new NotFoundException(__('Ubigeo inválido'));
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
				$this->Flash->success(__('El ubigeo ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El ubigeo no pudo ser guardado. Inténtalo de nuevo.'));
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
			throw new NotFoundException(__('Ubigeo inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Arbubigeo->save($this->request->data)) {
				$this->Flash->success(__('El ubigeo ha sido modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El ubigeo no pudo ser modificado. Inténtalo de nuevo.'));
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
			throw new NotFoundException(__('Ubigeo inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Arbubigeo->delete()) {
			$this->Flash->success(__('El ubigeo ha sido eliminado.'));
		} else {
			$this->Flash->error(__('El ubigeo no pudo ser eliminado. Inténtalo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

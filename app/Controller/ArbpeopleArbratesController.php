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
	// public function index() {
	// 	$this->ArbpeopleArbrate->recursive = 0;
	// 	$this->set('arbpeopleArbrates', $this->Paginator->paginate());
	// }

	public function index($paginador=null) {

		$this->ArbpeopleArbrate->recursive = 0;
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
								array('ArbpeopleArbrate.status'=>'DE') :
								array('ArbpeopleArbrate.status'=>'AC');

		$conditions = $conditions + $conditionsActivos;

		$this->paginate = array('limit' => 10,
								'page' => 1,
								'order' => array ('ArbpeopleArbrate.created' => 'asc'),
								'conditions' => $conditions,
								'recursive'=>1
								);

		$arbpeopleArbrates=$this->paginate('ArbpeopleArbrate');
		$this->set(compact('arbpeopleArbrates'));
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
			throw new NotFoundException(__('Pago de la persona inválido'));
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
				$this->Flash->success(__('El pago de la tasa de arbitrio de la persona ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El pago de la tasa de arbitrio de la persona no pudo ser guardado. Inténtalo de nuevo.'));
			}
		}
		$arbrates = $this->ArbpeopleArbrate->Arbrate->find('list',
																															array(
																																'fields' => array('Arbrate.id','Arbrate.year_and_month'),
																																'conditions' => array('Arbrate.status' => 'AC'),
																																'recursive' => 0
																															)
	);
		$this->set(compact('arbrates'));
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
			throw new NotFoundException(__('Pago de la persona inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ArbpeopleArbrate->save($this->request->data)) {
				$this->Flash->success(__('El pago de la tasa de arbitrio de la persona ha sido modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El pago de la tasa de arbitrio de la persona no pudo ser modificado. Inténtalo de nuevo.'));
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
			throw new NotFoundException(__('Pago de la persona inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ArbpeopleArbrate->delete()) {
			$this->Flash->success(__('El pago de la tasa de arbitrio de la persona ha sido eliminado.'));
		} else {
			$this->Flash->error(__('El pago de la tasa de arbitrio de la persona no pudo ser eliminado. Inténtalo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function json_search() {
		if ($this->request->is('ajax')){
			$response = array();
			$data = array();
			$arbpeople = $this->ArbpeopleArbrate->Arbperson->find(
				'all', array(
					'fields' => array('Arbperson.id','Arbperson.names','Arbperson.first_surname','Arbperson.second_surname'),
					'conditions' => array('Arbperson.status' => 'AC','Arbperson.dni' => $this->request->data['ArbpeopleArbrate']['dni']),
					'recursive' => 0
				)
			);
			foreach ($arbpeople as $arbperson) {
				$data['id'] = $arbperson['Arbperson']['id'];
				$data['name'] = $arbperson['Arbperson']['first_surname'].' '.$arbperson['Arbperson']['second_surname'].', '.$arbperson['Arbperson']['names'];
			}
			if (empty($arbpeople)) {
				$response = array(
					'message' =>'N.° D.N.I. no existe',
					'data' => array()
				);
			} else {
				$response = array(
					'message' =>'Selecione la Tasa',
					'data' => $data
				);
			}
			$this->set(compact('response'));
			$this->render('json_search', 'ajax');
		}
	}

	public function json_rate() {
		if ($this->request->is('ajax')){
			$response = array();
			$data = array();
			$arbrates = $this->ArbpeopleArbrate->Arbrate->find('all',
																																array(
																																	'fields' => array('Arbrate.id','Arbrate.monthly_rate'),
																																	'conditions' => array('Arbrate.status' => 'AC','Arbrate.id' => $this->request->data['ArbpeopleArbrate']['arbrate_id']),
																																	'recursive' => 0));
		foreach ($arbrates as $arbrate) {
		$data['id'] = $arbrate['Arbrate']['id'];
		$data['name'] = $arbrate['Arbrate']['monthly_rate'];
		}

			if (empty($arbrates)) {
				$response = array(
					'message' =>'Tasa no existe',
					'data' => array()
				);
			} else {
				$response = array(
					'message' =>'Selecione la Tasa',
					'data' => $data
				);
			}
			$this->set(compact('response'));
			$this->render('json_rate', 'ajax');
		}
	}

}

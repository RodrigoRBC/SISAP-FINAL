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

	public function generate_payment_report($id = null) {
		$this->layout='pdf';
		if (!$this->Arbperson->exists($id)) {
			throw new NotFoundException(__('Indentificador InvĂˇlido'));
		} else {
				$arbperson = array();
				$arbpeopleArbrates = array();
				$arbrates = array();
				$report_data = array();
				$arbperson = $this->Arbperson->find('first',
					array(
						'conditions' => array(
							'Arbperson.'. $this->Arbperson->primaryKey => $id),
						'fields' => array(
							'Arbperson.id',
							'Arbperson.arbubigeo_id',
							'Arbperson.dni',
							'Arbperson.names',
							'Arbperson.first_surname',
							'Arbperson.second_surname',
							'Arbperson.status'
						),
						'order' => 'Arbperson.first_surname asc',
						'recursive' => 0
						));
				$arbpersonId = $arbperson['Arbperson']['id'];

				$arbpeopleArbrates = $this->Arbperson->ArbpeopleArbrate->find('all',
					array(
						'conditions' => array(
							'ArbpeopleArbrate.arbperson_id'=> $arbpersonId),
						'fields' => array(
							'ArbpeopleArbrate.arbperson_id',
							'ArbpeopleArbrate.arbrate_id',
							'ArbpeopleArbrate.arbitration_rate',
							'ArbpeopleArbrate.payment_status',
							'ArbpeopleArbrate.payment_date',
							'ArbpeopleArbrate.document',
							'ArbpeopleArbrate.status',
							//'Arbrate.id',
						//	'Arbrate.year_and_month'
						),
						'order' => 'Arbrate.year_and_month asc',
						'recursive' => 0
						));

					$arbrates = $this->Arbperson->ArbpeopleArbrate->Arbrate->find('all', array(
							'conditions' => array('Arbrate.status'=> 'AC'),
							'fields' => array(
								'Arbrate.id',
								'Arbrate.year_and_month'
							),
							'order' => 'Arbrate.id asc',
							'recursive' => 1
					));

					$existsdata = 0;
					foreach ($arbrates as $keyarbrate => $valuearbrate) {
						foreach ($arbpeopleArbrates as $keyarbpeopleArbrate => $valuearbpeopleArbrate) {
							if ($valuearbpeopleArbrate['ArbpeopleArbrate']['arbrate_id'] == $valuearbrate['Arbrate']['id']) {
								$report_data[$keyarbrate] = $valuearbpeopleArbrate;
								$existsdata = 1;
							}
						}
						if ($existsdata == 1) {
							$existsdata = 0;
						}else {
							$report_data[$keyarbrate] = array(
								'ArbpeopleArbrate' => array(
									'arbperson_id' => '',
									'arbrate_id' => '',
									'arbitration_rate' => '',
									'payment_status' => 'PENDIENTE',
									'payment_date' => '',
									'document' => '',
									'status' => ''
								),
								'Arbrate' => array(
									'id' => $valuearbrate['Arbrate']['id'],
									'year_and_month' => $valuearbrate['Arbrate']['year_and_month']
								)
							);
						}
					}

				$this->set(compact('arbperson', 'arbpeopleArbrates','arbrates', 'report_data'));
		}
}

}

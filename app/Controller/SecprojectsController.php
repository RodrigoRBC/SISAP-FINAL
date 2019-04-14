<?php
class SecprojectsController extends AppController {

	public $name = 'Secprojects';
	public $helpers = array('Html', 'Form');
	
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow("oficiopdf","indexobservaciones");
    }

	function index() {
		$this->Secproject->recursive = 0;
		$elementos = array('Secproject.code'=>__('codigo',true),'Secproject.name'=>__('ProjectVer',true),'Secorganization.name'=>__('organizacion',true));
		$this->set('elementos',$elementos);			
		
		if(!empty($this->params['named']['valor']) || !empty($this->params['named']['desactivo']))
		{
			$this->request->data['Buscar']['buscador'] = $this->params['named']['buscador'];
			$this->request->data['Buscar']['valor'] = $this->params['named']['valor'];
			$this->request->data['Buscar']['desactivo'] = $this->params['named']['desactivo'];
		}
		
		$valorDeBusqueda = isset($this->request->data['Buscar']['valor'])?trim($this->request->data['Buscar']['valor']):null;
		$conditions = !empty($valorDeBusqueda)?
						array($this->request->data['Buscar']['buscador'].' LIKE'=>'%'.trim($this->request->data['Buscar']['valor']).'%'):
						array();		
		
		$conditionsActivos = (!empty($this->request->data['Buscar']['desactivo']) == 1) ?
								array('Secproject.status'=>'DE') :
								array('Secproject.status'=>'AC');
		
		$conditions = $conditions + $conditionsActivos;
		
		$fields=array('Secproject.id','Secproject.code','Secproject.name','Secproject.photo1','Secproject.photo2','Secproject.text1','Secproject.text2',
					  'Secproject.status','Secproject.address','Secproject.phono','Secorganization.name');
			
		$this->paginate = array('limit' => 10,
								'page' => 1,
								'order' => array ('Secproject.name' => 'asc'),
								'conditions' => $conditions,
								'fields' => $fields
								);
			
		$secprojects = $this->paginate('Secproject');
		$this->set('secprojects', $secprojects);
	}

	function indexobservaciones() {
		$this->Secproject->recursive = 0;
		$elementos = array('Secproject.name'=>__('ProjectVer',true));
		$this->set('elementos',$elementos);			
		
		if(!empty($this->params['named']['valor']) || !empty($this->params['named']['desactivo']))
		{
			$this->request->data['Buscar']['buscador'] = $this->params['named']['buscador'];
			$this->request->data['Buscar']['valor'] = $this->params['named']['valor'];
			$this->request->data['Buscar']['desactivo'] = $this->params['named']['desactivo'];
		}
		
		$valorDeBusqueda = isset($this->request->data['Buscar']['valor'])?trim($this->request->data['Buscar']['valor']):null;
		$conditions = !empty($valorDeBusqueda)?
						array($this->request->data['Buscar']['buscador'].' LIKE'=>'%'.trim($this->request->data['Buscar']['valor']).'%'):
						array();		
		
		$conditionsActivos = (!empty($this->request->data['Buscar']['desactivo']) == 1) ?
								array('Secproject.status'=>'DE') :
								array('Secproject.status'=>'AC');
		
		$conditions = $conditions + $conditionsActivos;
			
		$this->paginate = array('limit' => 10,
								'page' => 1,
								'conditions' => $conditions + array("Secproject.id <"=>28)
								);
			
		$secprojects = $this->paginate('Secproject');
		$this->set('secprojects', $secprojects);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('ProjectNoValido', true),'flash_failure');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('secproject', $this->Secproject->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Secproject->create();
			if ($this->Secproject->save($this->request->data)) {
				$this->Session->setFlash(__('ProjectGuardado', true),'flash_success');
				$this->redirect(array( 'action'=>'index'));
			} else {
				$this->Session->setFlash(__('ProjectNoGuardado', true),'flash_failure');
			}
		}
		$secorganizations = $this->Secproject->Secorganization->find('list',array('conditions'=>array('Secorganization.status'=>'AC')));
		$this->set('secorganizations',$secorganizations);
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('ProjectNoValido', true),'flash_failure');
			$this->redirect(array('action'=>'index'));
		}	
		if (!empty($this->request->data)) {
			$existSecassign = $this->Secproject->Secassign->find('count', array('conditions' => array('Secassign.status' => 'AC', 'Secassign.secproject_id'=>$id)));
			if($existSecassign and $this->request->data['Secproject']['status']=='DE')
			{
				$this->Session->setFlash(__('projectAsociado',true),'flash_failure');				
			}			
			else 
			{
				$statusempresa = $this->Secproject->Secorganization->find('first',
																		array('conditions'=>array('Secorganization.id'=>$this->request->data['Secproject']['secorganization_id']),
																			  'fields'=>array('Secorganization.status')));
				if(($statusempresa =='DE') && (($this->request->data['Secproject']['status']!== 'AC') || ($this->request->data['Secproject']['status']!=='LI'))){

					$this->Session->setFlash(__('sucursalEmpDesactivada',true),'flash_success');	
					//$this->request->data['Secrole']['status']= 'DE';	
				}
				else{
					if ($this->Secproject->save($this->request->data)) {
						$this->Session->setFlash(__('ProjectGuardado', true),'flash_success');
						$this->redirect(array('action'=>'index'));
					} else {
						$this->Session->setFlash(__('ProjectNoGuardado', true),'flash_failure');
					}
					
				}

			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Secproject->read(null, $id);
		}
		$secorganizations = $this->Secproject->Secorganization->find('list');
		$this->set('secorganizations',$secorganizations);
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('ProjectNoValido', true),'flash_failure');
		}
		else{
			$existSecassign = $this->Secproject->Secassign->find('count', array('conditions' => array('Secassign.status' => 'AC', 'Secassign.secproject_id'=>$id)));
			if($existSecassign)
				{
				$this->Session->setFlash(__('projectAsociado',true),'flash_failure');				
				}
			else{	$this->request->data['Secproject']['id']=$id;
					$this->request->data['Secproject']['status']='DE';
					if ($this->Secproject->save($this->request->data)) 
						{
						$this->Session->setFlash(__('ProjectDesactivado', true),'flash_success');	
						}
					else 
						{
						$this->Session->setFlash(__('ProjectNoDesactivado',true),'flash_failure');	
						}		
				}
		}
		$this->redirect(array('action'=>'index'));
	}

	public function oficiopdf($id = null){
		$this->layout = 'print';
		$this->loadModel("Historiale");
		$this->loadModel('Informe');

		$informe = $this->Informe->find('first',array('conditions'=>array('Informe.fechainicio <='=>date("Y-m-d"),'Informe.fechafin >='=>date("Y-m-d"))));	
		//$informe = $this->Informe->find('first',array('conditions'=>array('Informe.id'=>2)));
		$observaciones = $this->Historiale->find("all",
			array(
			"fields"=>array("Fdesagregada.descripcion","Historiale.observacion",'Cmc.descripcion','Estandare.id','Persona.firstname','Persona.appaterno','Persona.apmaterno','Secperson.id'),
			"joins"=>array(			
							        array(
							            'alias' => 'Fdesecproject',
							            'table' => 'fdesecprojects',
							            'type' => 'INNER',
							            'conditions' => '`Fdesecproject`.`id` = `Historialreporte`.`fdesecproject_id`'
							        ),
							        array(
							            'alias' => 'Fdesagregada',
							            'table' => 'fdesagregadas',
							            'type' => 'INNER',
							            'conditions' => '`Fdesagregada`.`id` = `Fdesecproject`.`fdesagregada_id`'
							        ),
							        array(
							            'alias' => 'Fgenerale',
							            'table' => 'fgenerales',
							            'type' => 'INNER',
							            'conditions' => '`Fgenerale`.`id` = `Fdesagregada`.`fgeneral_id`'
							        ),
							        array(
							            'alias' => 'Criterio',
							            'table' => 'criterios',
							            'type' => 'INNER',
							            'conditions' => '`Criterio`.`id` = `Fgenerale`.`criterio_id`'
							        ),
							        array(
							            'alias' => 'Persona',
							            'table' => 'secpeople',
							            'type' => 'INNER',
							            'conditions' => '`Persona`.`id` = `Historialreporte`.`secperson_id`'
							        ),
							        array(
							            'alias' => 'Estandare',
							            'table' => 'estandares',
							            'type' => 'INNER',
							            'conditions' => '`Estandare`.`id` = `Criterio`.`Estandar_id`'
							        ),
							        array(
							            'alias' => 'Cmc',
							            'table' => 'cmcs',
							            'type' => 'INNER',
							            'conditions' => '`Cmc`.`id` = `Historialreporte`.`cmc_id`'
							        ),
						),
			"conditions"=>array("Historiale.id = (select Max(id) from historiales where historialreporte_id = Historiale.historialreporte_id)","Fdesecproject.secproject_id"=>$id,'Historialreporte.fechainicial >='=>$informe['Informe']['fechainicio'],'Historialreporte.fechafin <='=>$informe[//'Informe']['fechafin'],"(Historiale.secperson_id=22 OR Historiale.secperson_id=11)",
				'Informe']['fechafin'],"Fdesecproject.avanceevaluador !="=>100,"(Historiale.secperson_id=22 OR Historiale.secperson_id=11)",
			),
			"group"=>array("`Fdesagregada`.`descripcion`"),
			"order"=>array("Cmc.descripcion"=>"ASC","Fdesagregada.id"=>"ASC"),
		));
		$this->set(compact("observaciones"));
		$extemporaneos = $this->Historiale->find("all",
			array(
			"fields"=>array("Fdesagregada.descripcion","Historiale.observacion",'Cmc.descripcion','Estandare.id','Persona.firstname','Persona.appaterno','Persona.apmaterno','Secperson.id'),
			"joins"=>array(			
							        array(
							            'alias' => 'Fdesecproject',
							            'table' => 'fdesecprojects',
							            'type' => 'INNER',
							            'conditions' => '`Fdesecproject`.`id` = `Historialreporte`.`fdesecproject_id`'
							        ),
							        array(
							            'alias' => 'Fdesagregada',
							            'table' => 'fdesagregadas',
							            'type' => 'INNER',
							            'conditions' => '`Fdesagregada`.`id` = `Fdesecproject`.`fdesagregada_id`'
							        ),
							        array(
							            'alias' => 'Fgenerale',
							            'table' => 'fgenerales',
							            'type' => 'INNER',
							            'conditions' => '`Fgenerale`.`id` = `Fdesagregada`.`fgeneral_id`'
							        ),
							        array(
							            'alias' => 'Criterio',
							            'table' => 'criterios',
							            'type' => 'INNER',
							            'conditions' => '`Criterio`.`id` = `Fgenerale`.`criterio_id`'
							        ),
							        array(
							            'alias' => 'Persona',
							            'table' => 'secpeople',
							            'type' => 'INNER',
							            'conditions' => '`Persona`.`id` = `Historialreporte`.`secperson_id`'
							        ),
							        array(
							            'alias' => 'Estandare',
							            'table' => 'estandares',
							            'type' => 'INNER',
							            'conditions' => '`Estandare`.`id` = `Criterio`.`Estandar_id`'
							        ),
							        array(
							            'alias' => 'Cmc',
							            'table' => 'cmcs',
							            'type' => 'INNER',
							            'conditions' => '`Cmc`.`id` = `Historialreporte`.`cmc_id`'
							        ),
						),
			"conditions"=>array("Historiale.id = (select Max(id) from historiales where historialreporte_id = Historiale.historialreporte_id)",
				//"Fdesecproject.secproject_id"=>$id,'Historialreporte.fechaext >='=>date("Y-m-d"),
				"Fdesecproject.secproject_id"=>$id,'Historialreporte.fechaext >='=>date("Y-m-d"),"Fdesecproject.avanceevaluador !="=>100,
				"(Historiale.secperson_id=22 OR Historiale.secperson_id=11)",
			),
			"order"=>array("Cmc.id"=>"ASC","Fdesagregada.id"=>"ASC"),
			"group"=>array("Fdesagregada.descripcion"),
		));
		$secproject = $this->Secproject->find("first",array('conditions'=>array('Secproject.id'=>$id)));
		$this->set(compact("extemporaneos","secproject","informe"));
	}
		
}
?>
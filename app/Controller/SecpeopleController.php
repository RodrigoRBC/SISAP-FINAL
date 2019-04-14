<?php
class SecpeopleController extends AppController {

	public $name = 'Secpeople';
	public $helpers = array('Html', 'Form');
	public $uses = array('Secperson','Secconfiguration');
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("modifiedpassworduser");
    }

	function modifiedpassworduser() {
		$dt = $this->_getDtLg();
		if(!empty($this->request->data))
		{
			$configuration = $this->Secconfiguration->find('first',array('fields' => array('minpasswordlength')));
			$this->Secperson->validate = array(					
					'nuevacontrasenia' => array('notBlank'),
					'confirmarcontrasenia' => array('notBlank'),					
				);
				
			$this->Secperson->set($this->request->data);
			if (!$this->Secperson->validates()) {					
				$this->Session->setFlash(__('completeDatos', true),'flash_failure');
			}
			else if($this->request->data['Secperson']['nuevacontrasenia'] != $this->request->data['Secperson']['confirmarcontrasenia'])
			{
				$this->Session->setFlash(__('passwordDiferentes', true),'flash_failure');
				
			}else if (strlen($this->request->data['Secperson']['nuevacontrasenia']) < $configuration['Secconfiguration']['minpasswordlength']) {
										
					$this->Session->setFlash(__('passwordCaracteresMinimo', true).' '.$configuration['Secconfiguration']['minpasswordlength']);
			}
			else
			{				
				$person = $this->Secperson->find('first' ,array('fields' => array('Secperson.password'),
																'conditions' => array('Secperson.id' => $dt['Secperson']['id'])));
																
				$password['Secpassword']['secperson_id'] =$dt['Secperson']['id'];
				$password['Secpassword']['password'] = $person['Secperson']['password'];				
				$password['Secpassword']['creationdatetime'] = date('Y-m-d');
				$password['Secpassword']['status'] = 'DE';				
				
				$this->request->data['Secperson']['password'] = $this->Auth->password(strtolower($this->request->data['Secperson']['nuevacontrasenia']));
				//$this->request->data['Secperson']['expirationdate'] = date('Y-m-d');
				
				$this->Secperson->begin();
						
				$this->Secperson->Secpassword->create();
				if($this->Secperson->save($this->request->data) && $this->Secperson->Secpassword->save($password))
				{				
					$this->Secperson->commit();
					//$this->Session->write('actualizarPadre', true);	
					$this->Session->setFlash(__('personaGravoModificacionContrasenia', true),'flash_success');
					$this->redirect(array('controller'=>'pages','action'=>'home'));
				}
				else
				{				
					$this->Secperson->rollback();
					$this->Session->setFlash(__('personaNoGravoModificacionContrasenia', true),'flash_failure');
				}
			}
		}
		$id = $dt['Secperson']['id'];
		$this->request->data = $this->Secperson->find('first' ,array('conditions' => array('Secperson.id' => $id)));
		$usuario =  $this->request->data['Secperson']['appaterno'].' '.$this->request->data['Secperson']['apmaterno'].', '.$this->request->data['Secperson']['firstname'];
		$this->set('usuario' , $usuario);														
		unset($this->request->data['Secperson']['nuevacontrasenia']);
		unset($this->request->data['Secperson']['confirmarcontrasenia']);
	}	
	
	function modificarpasswordusuario($id = null) {
		if(!empty($this->request->data))
		{
			$configuration = $this->Secconfiguration->find('first',array('fields' => array('minpasswordlength')));
			$this->Secperson->validate = array(					
					'nuevacontrasenia' => array('notempty'),
					'confirmarcontrasenia' => array('notempty'),					
				);
				
			$this->Secperson->set($this->request->data);
			if (!$this->Secperson->validates()) {					
				$this->Session->setFlash(__('completeDatos', true),'flash_failure');
			}
			else if($this->request->data['Secperson']['nuevacontrasenia'] != $this->request->data['Secperson']['confirmarcontrasenia'])
			{
				$this->Session->setFlash(__('passwordDiferentes', true),'flash_failure');
				
			}else if (strlen($this->request->data['Secperson']['nuevacontrasenia']) < $configuration['Secconfiguration']['minpasswordlength']) {
										
					$this->Session->setFlash(__('passwordCaracteresMinimo', true).' '.$configuration['Secconfiguration']['minpasswordlength']);
			}
			else
			{				
				$person = $this->Secperson->find('first' ,array('fields' => array('Secperson.password'),
																'conditions' => array('Secperson.id' => $this->request->data['Secperson']['id'])));
																
				$password['Secpassword']['secperson_id'] =$this->request->data['Secperson']['id'];
				$password['Secpassword']['password'] = $person['Secperson']['password'];				
				$password['Secpassword']['creationdatetime'] = date('Y-m-d');
				$password['Secpassword']['status'] = 'DE';				
				
				$this->request->data['Secperson']['password'] = $this->Auth->password(strtolower($this->request->data['Secperson']['nuevacontrasenia']));
				//$this->request->data['Secperson']['expirationdate'] = date('Y-m-d');
				
				$this->Secperson->begin();
						
				$this->Secperson->Secpassword->create();
				if($this->Secperson->save($this->request->data) && $this->Secperson->Secpassword->save($password))
				{				
					$this->Secperson->commit();
					//$this->Session->write('actualizarPadre', true);	
					$this->Session->setFlash(__('personaGravoModificacionContrasenia', true),'flash_success');
					$this->redirect(array('action'=>'index'));
				}
				else
				{				
					$this->Secperson->rollback();
					$this->Session->setFlash(__('personaNoGravoModificacionContrasenia', true),'flash_failure');
				}
			}
		}
		$id = isset($id)?$id:$this->request->data['Secperson']['id'];
		$this->request->data = $this->Secperson->find('first' ,array('conditions' => array('Secperson.id' => $id)));
		$usuario =  $this->request->data['Secperson']['appaterno'].' '.$this->request->data['Secperson']['apmaterno'].', '.$this->request->data['Secperson']['firstname'];
		$this->set('usuario' , $usuario);														
		unset($this->request->data['Secperson']['nuevacontrasenia']);
		unset($this->request->data['Secperson']['confirmarcontrasenia']);
	}	
	
	function modificarpassword() {		
		$this->Secperson->validate = array(
					'username' => array('notempty'),
					'password' => array('notempty'),
					'nuevacontrasenia' => array('notempty'),
					'confirmarcontrasenia' => array('notempty'),					
				);
				
		$this->Secperson->set($this->request->data);
		
		if (!$this->Secperson->validates()) {					
			$this->Session->setFlash(__('completeDatos', true),'flash_failure');
		}
		
		$this->Secperson->recursive = -1;
		$secperson = $this->Secperson->find('first',array('conditions' => array('Secperson.username' => $this->request->data['Secperson']['username'],
											'Secperson.password' => $this->Auth->password($this->request->data['Secperson']['password']))));
		
		if(!empty($secperson) && !empty($this->request->data['Secperson']['nuevacontrasenia']) && !empty($this->request->data['Secperson']['confirmarcontrasenia'])
			&& ($this->request->data['Secperson']['nuevacontrasenia'] == $this->request->data['Secperson']['confirmarcontrasenia']))
		{			
			$password['Secpassword']['secperson_id'] = $secperson['Secperson']['id'];
			$password['Secpassword']['password'] = $this->Auth->password($this->request->data['Secperson']['password']);
			$password['Secpassword']['creationdatetime'] = date('Y-m-d');
			$password['Secpassword']['status'] = 'DE';
			
			$this->request->data['Secperson']['id'] = $secperson['Secperson']['id'];
			$this->request->data['Secperson']['password'] = $this->Auth->password($this->request->data['Secperson']['nuevacontrasenia']);
			$this->request->data['Secperson']['expirationdate'] = date('Y-m-d');

			$this->Secperson->begin();
						
			$this->Secperson->Secpassword->create();
			if($this->Secperson->save($this->request->data) && $this->Secperson->Secpassword->save($password))
			{				
				$this->Secperson->commit();
				$this->Session->setFlash(__('personaGravoModificacionContrasenia', true),'flash_success');
				$this->redirect(array('action'=>'index'));
			}
			else
			{				
				$this->Secperson->rollback();
				$this->Session->setFlash(__('personaNoGravoModificacionContrasenia', true),'flash_failure');
			}
		}else if($this->request->data['Secperson']['nuevacontrasenia'] != $this->request->data['Secperson']['confirmarcontrasenia'])
		{
			$this->Session->setFlash(__('passwordDiferentes', true),'flash_failure');
		}
		
		unset($this->request->data['Secperson']['password']);
		unset($this->request->data['Secperson']['nuevacontrasenia']);
		unset($this->request->data['Secperson']['confirmarcontrasenia']);
		
	}
	
	function index($paginador=null) {
		if(!empty($this->request->params['named']['page'])){
			$this->Session->write('Secpeople.page',$this->request->params['named']['page']);
			$this->request->params['named']['page'] = $this->Session->read('Secpeople.page');
		}
		$this->set('paginador',$paginador);		
		$this->Secperson->recursive = -1;
		$elementos = array('Secperson.username'=>__('usuario', TRUE),
						   'Secperson.appaterno'=>__('apellidoPaterno', TRUE),
						   'Secperson.apmaterno'=>__('apellidoMaterno', TRUE)
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
								array('Secperson.status'=>'DE') :
								array('Secperson.status'=>'AC');
		
		$conditions = $conditions + $conditionsActivos;
					
		$this->paginate = array('limit' => 10,
								'page' => 1,
								'order' => array ('Secperson.appaterno' => 'asc'),
								'conditions' => $conditions
								);

		$secpeople=$this->paginate('Secperson');
		$this->set(compact('secpeople'));
	}

	function indexdocentes($paginador=null) {
		$this->set('paginador',$paginador);		
		$dt = $this->_getDtLg();
		$this->Secperson->recursive = -1;
		$elementos = array('Secperson.username'=>__('usuario', TRUE),
						   'Secperson.appaterno'=>__('apellidoPaterno', TRUE),
						   'Secperson.apmaterno'=>__('apellidoMaterno', TRUE)
						   );
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
								array('Secperson.status'=>'DE') :
								array('Secperson.status'=>'AC');
		
		$conditions = $conditions + $conditionsActivos;
					
		$this->paginate = array('limit' => 10,
								'page' => 1,
								'order' => array ('Secperson.appaterno' => 'asc'),
								'conditions' => $conditions + array('Secperson.secproject_id'=>$dt['Secproject']['id'])
								);

		$secpeople=$this->paginate('Secperson');
		$this->set('secpeople',$secpeople);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('personaNoValida', true),'flash_failure');
			$this->redirect(array('action'=>'index'));
		}
		
		//busqueda de los nombres de los roles, sucursales asociados a la persona
		//Nos da los id de las organizaciones
		$personId = $this->Secperson->Secassign->find('all', 
						array(	'conditions' => array('Secassign.secperson_id'=> $id, 'Secassign.status'=>'AC'), 
								'recursive' => 0,
								'fields' => array('Secproject.secorganization_id',
												  'Secproject.name',
												  'Secrole.name'),
							));

		//conseguimos el nombre organizacion
		foreach($personId as $Key => $Value){
			
			$personEmpresa =
			$this->Secperson->Secassign->Secproject->Secorganization->find('all', 
						array(	'conditions' => array('Secorganization.id'=>$Value['Secproject']['secorganization_id']), 
								'recursive' => 0,
								'fields' => array('Secorganization.name'))
								); 
								
			$personId[$Key]['Secorganization']['name'] = $personEmpresa[0]['Secorganization']['name'];
		}
		
		$this->set('personDetalle',$personId);
		$this->Secperson->recursive = -1;
		$this->set('secperson', $this->Secperson->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {			
			//Seteamos los datos para poder utilizar la funcion validates
			$this->Secperson->set($this->request->data);
			
			//Validamos que todo los datos este correcto
			//$creacion = $this->request->data['Secperson']['creationdate'];
			//$expiracion= $this->request->data['Secperson']['expirationdate'];
			/*$this->request->data['Secperson']['creationdate'] = $this->Secperson->configurarFechaYMD($creacion);
			$this->request->data['Secperson']['expirationdate'] = $this->Secperson->configurarFechaYMD($expiracion);*/
			
			if (!$this->Secperson->validates()) {					
				$errors = $this->Secperson->validationErrors;
				/*$this->request->data['Secperson']['creationdate'] = $creacion;
				$this->request->data['Secperson']['expirationdate'] = $expiracion;*/
				$this->Session->setFlash(__('personaNoGuardada', true),'flash_failure');
			}
			else
			{
				$configuration = $this->Secconfiguration->find('first',array('fields' => array('minpasswordlength')));
				// validamos que el password sea mayor o igual que la cantidad de caractreres configurados en configuratiosn
				if (strlen($this->request->data['Secperson']['password']) < $configuration['Secconfiguration']['minpasswordlength']) {
					/*$this->request->data['Secperson']['creationdate'] = $creacion;
					$this->request->data['Secperson']['expirationdate'] = $expiracion;	*/				
					$this->Session->setFlash(__('passwordCaracteresMinimo', true).' '.$configuration['Secconfiguration']['minpasswordlength']);
				}
				else
				{					
					
					$this->Secperson->create();					
					$this->request->data['Secperson']['password'] = $this->Auth->password($this->request->data['Secperson']['password']);
					//$creacion = $this->request->data['Secperson']['creationdate'];
					//$expiracion= $this->request->data['Secperson']['expirationdate'];
					/*if($creacion >= $expiracion){
						$this->request->data['Secperson']['creationdate'] = $creacion;
						$this->request->data['Secperson']['expirationdate'] = $expiracion;
						$this->Session->setFlash(__('personaControlFecha'),'flash_failure');				
					}	
					else{*/
						if ($this->Secperson->save($this->request->data)) {
							$this->Session->setFlash(__('personaGuardada'),'flash_success');
							$this->redirect(array('action'=>'index'));
						} else {
							$this->request->data['Secperson']['creationdate'] = $creacion;
							$this->request->data['Secperson']['expirationdate'] = $expiracion;
							$this->Session->setFlash(__('personaNoGuardada'),'flash_failure');
						}
					//}
				}
			}			
		}
		$this->request->data['Secperson']['password']='';
		
		//Incrementamos un dia a la fecha de expiracion
		/*$expirationdate = date("d-m-Y",strtotime(date("d-m-Y")) + (86400));		
		$this->request->data['Secperson']['expirationdate']['day'] = date('d',strtotime($expirationdate));
		$this->request->data['Secperson']['expirationdate']['month'] = date('m',strtotime($expirationdate));
		$this->request->data['Secperson']['expirationdate']['year'] = date('Y',strtotime($expirationdate));*/
	}

	function adddocente() {
		$dt = $this->_getDtLg();
		if (!empty($this->request->data)) {			
			$this->Secperson->set($this->request->data);
			
			if (!$this->Secperson->validates()) {					
				$errors = $this->Secperson->validationErrors;
				$this->Session->setFlash(__('personaNoGuardada', true),'flash_failure');
			}
			else
			{
					$this->Secperson->create();					
					$this->request->data['Secperson']['secproject_id'] = $dt['Secproject']['id'];
					if ($this->Secperson->save($this->request->data)) {
						$this->Session->setFlash(__('personaGuardada'),'flash_success');
						$this->redirect(array('action'=>'indexdocentes'));
					} else {
						$this->request->data['Secperson']['creationdate'] = $creacion;
						$this->request->data['Secperson']['expirationdate'] = $expiracion;
						$this->Session->setFlash(__('personaNoGuardada'),'flash_failure');
					}
			}			
		}
		$this->request->data['Secperson']['password']='';
	}

	function addintegranteco() {
		$this->layout = 'asignacion';
		$dt = $this->_getDtLg();
		if (!empty($this->request->data)) {			
			$this->Secperson->set($this->request->data);
			
			if (!$this->Secperson->validates()) {					
				$errors = $this->Secperson->validationErrors;
				$this->Session->setFlash(__('personaNoGuardada', true),'flash_failure');
			}
			else
			{
					$this->Secperson->create();					
					$this->request->data['Secperson']['secproject_id'] = $dt['Secproject']['id'];
					$this->request->data['Secperson']['language'] = 'spa';
					$this->request->data['Secperson']['usuario'] = '0';
					$this->request->data['Secperson']['regimen'] = 'NN';
					if ($this->Secperson->save($this->request->data)) {
						$this->Session->setFlash(__('personaGuardada'),'flash_success');
						$this->Session->write('actualizarPadre', true);	
					}
			}			
		}
		$this->request->data['Secperson']['password']='';
	}

	function editdocente($id = null) {	
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('personaNoValida', true),'flash_failure');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
						
				$dependientes = $this->Secperson->Secassign->find('count', 
							array('conditions' => array('Secassign.secperson_id' => $id, 'Secassign.status'=>'AC')));
							
				if(!$dependientes || ($this->request->data['Secperson']['status']=='AC')||($this->request->data['Secperson']['status']=='LI')){
						$this->loadModel('Aro');
						$this->loadModel('Secassign');
						$this->Secperson->begin();
						
						$asignacciones = $this->Secassign->find('all',array('fields' => array('id'),
																			'conditions' => array('secperson_id' => $id,'status' => 'AC'),
																			'recursive' => -1
																			));
						foreach($asignacciones as $asignacion){ 						
							$aro = $this->Aro->find('first',array('fields' => array('id'),'conditions' => array('foreign_key' => $asignacion['Secassign']['id'],'model' => 'Secassign')));
							$this->Aro->id = $aro['Aro']['id'];
							if (!$this->Aro->saveField('alias',$this->request->data['Secperson']['username'])) {
								$this->Secperson->rollback();							
								$this->Session->setFlash(__('personaNoGuardada', true),'flash_failure');
							}
						$this->request->data['Secperson']['secproject_id'] = $dt['Secproject']['id'];
						if ($this->Secperson->save($this->request->data)) {
							$this->Secperson->commit();
							$this->Session->setFlash(__('personaGuardada', true),'flash_success');
							$this->redirect(array('action'=>'indexdocentes'));
						} else {
							$this->Secperson->rollback();
							$this->Session->setFlash(__('personaNoGuardada', true),'flash_failure');
						}
						
					}
				}else{
					$this->Session->setFlash(__('personaAsociada', true),'flash_failure');
				}	
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Secperson->read(null, $id);
		}	
		$secperson = $this->request->data;
		$this->set('secperson', $secperson);		
	}

	function edit($id = null) {		
		$page = $this->Session->read('Secpeople.page');
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('personaNoValida', true),'flash_failure');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {						
				$dependientes = $this->Secperson->Secassign->find('count', 
							array('conditions' => array('Secassign.secperson_id' => $id, 'Secassign.status'=>'AC')));					
				if(!$dependientes || ($this->request->data['Secperson']['status']=='AC')||($this->request->data['Secperson']['status']=='LI')){
						$this->loadModel('Aro');
						$this->loadModel('Secassign');
						$this->Secperson->begin();
						
						$asignacciones = $this->Secassign->find('all',array('fields' => array('id'),
																			'conditions' => array('secperson_id' => $id,'status' => 'AC'),
																			'recursive' => -1
																			));
						foreach($asignacciones as $asignacion){ 						
							$aro = $this->Aro->find('first',array('fields' => array('id'),'conditions' => array('foreign_key' => $asignacion['Secassign']['id'],'model' => 'Secassign')));
							$this->Aro->id = $aro['Aro']['id'];
							if (!$this->Aro->saveField('alias',$this->request->data['Secperson']['username'])) {
								$this->Secperson->rollback();							
								$this->Session->setFlash(__('personaNoGuardada', true),'flash_failure');
							}
						//}
						//$this->request->data['Secperson']['creationdate'] = $this->Secperson->configurarFechaYMD($creacion);
						//$this->request->data['Secperson']['expirationdate'] = $this->Secperson->configurarFechaYMD($expiracion);
						if ($this->Secperson->save($this->request->data)) {
							$this->Secperson->commit();
							$this->Session->setFlash(__('personaGuardada', true),'flash_success');
							//$this->redirect(array('action'=>'index'));
							$this->redirect(array('action'=>'index/page:'.$page));
						} else {
							$this->Secperson->rollback();
							$this->Session->setFlash(__('personaNoGuardada', true),'flash_failure');
						}
						
					}
				}else{
					$this->Session->setFlash(__('personaAsociada', true),'flash_failure');
				}	
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Secperson->read(null, $id);
			//$this->request->data['Secperson']['creationdate'] = $this->Secperson->getFechaDMY($this->request->data['Secperson']['creationdate']);
			//$this->request->data['Secperson']['expirationdate'] = $this->Secperson->getFechaDMY($this->request->data['Secperson']['expirationdate']);
		}	
		$secperson = $this->request->data;
		$this->set('secperson', $secperson);		
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setflash(__('personaNoValida', true),'flash_failure');
			
		}else{
			$dependientes = $this->Secperson->Secassign->find('count', 
						array('conditions' => array('Secassign.secperson_id' => $id, 'Secassign.status'=>'AC')));
			
			if(!$dependientes){			
				$this->request->data['Secperson']['id'] = $id;
				$this->request->data['Secperson']['status']= 'DE';
				if($this->Secperson->save($this->request->data)){			
					$this->Session->setFlash(__('personaDesactivada', true),'flash_success');	
					$this->redirect(array('action'=>'index'));			
				}
				else{
					$this->Session->setFlash(__('personaNoDesactivada', true),'flash_failure');
					$this->redirect(array('action'=>'index'));
				}
			}else{
				$this->Session->setFlash(__('personaAsociada', true),'flash_failure');
				$this->redirect(array('action'=>'index'));
			}
			
		}
	}

	function getUserListaJson() {
		Configure::write('debug',0);
		$this->layout = 'ajax';
		$userLista = $this->Secperson->getUserListaJson($this->params['url']['term']);
		
		echo $userLista;
		$this->autoRender = false;
	}

	function asignar($id = null,$secproject_id = null){			
		$this->loadModel('Fdesecproject');
		$this->loadModel('Historialreporte');
		$this->loadModel('Cmc');	
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('personaNoValida', true),'flash_failure');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {	
			/*debug($this->request->data);
			exit();*/
			//$this->request->data['Secperson']['generated'] = 1;
			if($this->Secperson->save($this->request->data)){	
				$this->Historialreporte->generate($this->request->data['Secperson']['secproject_id']);
				/*$this->Historialreporte->generatexcmc($this->request->data['Secperson']['cmc_id'],$this->request->data['Secperson']['id'],$this->request->data['Secperson']['secproject_id']);*/
				//$this->Cmc->actualizarasignacion($this->request->data['Secperson']['cmc_id']);
				//$this->Historialreporte->asignar($this->request->data['Secperson']['id'],$this->request->data['Historialreporte']);
				$this->Session->setFlash(__('Se ah asignado satisfactoriamente.'),'flash_success');
				$this->redirect(array('controller'=>'secassigns','action'=>'indextecnicos',$this->request->data['Secperson']['id']));			
			}
			else{
				$this->Session->setFlash(__('Ah ocurrido un error. Intente de nuevo', true),'flash_failure');
				$this->redirect(array('action'=>'asignar',$this->request->data['Secperson']['id']));
			}
		}
		$this->request->data = $this->Secperson->read(null, $id);
		$secperson = $this->request->data;
		//$cmcs = $this->Cmc->find('list',array('conditions'=>array('Cmc.status'=>'AC','Cmc.secproject_id'=>$secperson['Secassign'][0]['secproject_id'],'Cmc.asignado'=>'NO')));
		/*$cmcs = $this->Cmc->find('list',array('conditions'=>array('Cmc.status'=>'AC','Cmc.asignado'=>'NO','Cmc.secproject_id'=>$secproject_id)));*/
		$secprojects = $this->Secperson->Secassign->Secproject->find('all',array('conditions'=>array('Secproject.status'=>'AC','Secproject.id'=>$secproject_id)));
		/*$fdesagregadas = $this->Fdesecproject->find('all',array('conditions'=>array('Fdesecproject.secproject_id'=>$secproject_id)));
		$historiales = $this->Historialreporte->find('all',array('conditions'=>array('Historialreporte.secperson_id'=>$id)));
		foreach ($historiales as $key => $historiale) {
			foreach ($fdesagregadas as $key1 => $value) {
				if($historiale['Fdesecproject']['fdesagregada_id']==$value['Fdesagregada']['id'])
					$historiales[$key]['Fdesagregada']['descripcion'] = $value['Fdesagregada']['descripcion'];
			}
		}*/
		$this->set(compact('secperson','fdesagregadas','historiales','secprojects','cmcs'));
	}


}
?>
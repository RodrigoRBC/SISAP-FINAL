<?php
class Secproject extends AppModel {

	public $name = 'Secproject';
	public $displayField = 'name';
	public $virtualFields = array('carscod'=>'Secproject.code');
	public $validate = array(
		'secorganization_id' => array(
		
							 'notBlank' => array(
					            'rule' => 'notBlank',  
					            'last' => true
					         ),
							 'numeric' => array(
					            'rule' => 'numeric',  
					            'last' => true
					         )

		),
		
        'code' => array(
						'notBlank' =>array(
								'rule'=>'notBlank',
								'last' => true
								),
								
						'maxLength' => array(
						        'rule' => array('maxLength', '5'),				        
								'last' => true
				   				), 
												
						'alphaNumeric'=> array(
            						'rule' =>'alphaNumeric',
            						'last' => true
									),
									
						'codeexist' => array(
					        	'rule' => 'codeexist',  
								'last' => true					        	
								),
		),		
		
		'name' => array(
						'notBlank' =>array(
								'rule'=>'notBlank',
								'last' => true
								),
														
						'maxLength' => array(
						        'rule' => array('maxLength', '60'),				        
								'last' => true
				   				),
								
						'descripcionexist' => array(
					        	'rule' => 'descripcionexist',  
								'last' => true					        	
								),  
		),
		
		'address' => array(	
							'maxLength' => array(
						        'rule' => array('maxLength', '60'),				        
								'last' => true
				   				),  
							'notBlank' =>array(
								'rule'=>'notBlank',
								'last' => true
								),
		),
				
		'phono' => array(								       							
						'maxLength' => array(
						        'rule' => array('maxLength', '15'),				        
								'last' => true
				   				),  
		),
			
		'status' => array('notBlank'),
	);
	
	public $belongsTo = array(
		'Secorganization' => array(
			'className' => 'Secorganization',
			'foreignKey' => 'secorganization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Secassign' => array(
			'className' => 'Secassign',
			'foreignKey' => 'secproject_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)	
	);
	
   function codeexist(){
		$data=$this->data;
		if(empty($data['Secproject']['id'])){
  			$existemp = $this->find('count', array('conditions' => array('Secproject.secorganization_id' => $data['Secproject']['secorganization_id'],
	   											  						'upper(Secproject.code)' => strtoupper($data['Secproject']['code'])
																		),
												  'recursive'=>-1					
												 )
   								  ); 		
		}else{

  			$existemp = $this->find('count', array('conditions' => array('Secproject.secorganization_id' => $data['Secproject']['secorganization_id'],
	   											  						'upper(Secproject.code)' =>  strtoupper($data['Secproject']['code']),
																		'Secproject.id != ' => $data['Secproject']['id']
																		),
												  'recursive'=>-1					
												 )
   								  ); 			
		}
							  
	   return $existemp < 1;
    }
	
	 function descripcionexist(){
		$data=$this->data;
		if(empty($data['Secproject']['id'])){
  			$existemp = $this->find('count', array('conditions' => array('Secproject.secorganization_id' => $data['Secproject']['secorganization_id'],
	   											  						'upper(Secproject.name)' => strtoupper($data['Secproject']['name'])
																		),
												  'recursive'=>-1					
												 )
   								  ); 		
		}else{

  			$existemp = $this->find('count', array('conditions' => array('Secproject.secorganization_id' => $data['Secproject']['secorganization_id'],
	   											  						'upper(Secproject.name)' =>  strtoupper($data['Secproject']['name']),
																		'Secproject.id != ' => $data['Secproject']['id']
																		),
												  'recursive'=>-1					
												 )
   								  ); 			
		}
							  
	   return $existemp < 1;
    }
	
	function getSucursalesLista($secorganization_id){
		$sucursalesLista = $this->find('list',array(
								'fields'=>array('Secproject.id','Secproject.name'),
								'conditions'=>array('Secproject.secorganization_id'=>$secorganization_id),
								'recursive'=>-1));
		return $sucursalesLista;
	}
	
	function obtenerName($id) {
		$this->unbindModel(array(
			'hasMany'=>array('Secassign'), 
			'belongsTo'=>array('Secorganization')
		));
		$campos = array('Secproject.name');
		$project = $this->findById($id, $campos);
		return $project?$project['Secproject']['name']:'';
	}
	
}
?>
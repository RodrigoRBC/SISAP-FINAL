<?php
class Secorganization extends AppModel {
	
	public $displayField = 'name';
	public $name = 'Secorganization';
	
	public $validate = array(
		'code' => array(
						'notEmpty' =>array(
								'rule'=>'notEmpty',
								'last' => true
								),
								
						'maxLength' => array(
						        'rule' => array('maxLength', '5'),				        
								'last' => true
				   				), 
								
				        'isUnique' => array(
					        	'rule' => 'isUnique',  
								'last' => true					        	
								),
								
						'alphaNumeric'=> array(
            						'rule' =>'alphaNumeric',
            						'last' => true
									),
		),		
		
		'name' => array(
						'notEmpty' =>array(
								'rule'=>'notEmpty',
								'last' => true
								),
								
				        'isUnique' => array(
					        	'rule' => 'isUnique',  
					        	'last' => true
								),
								
						'maxLength' => array(
						        'rule' => array('maxLength', '60'),				        
								'last' => true
				   				),  
		),
		
		'address' => array(	
							'maxLength' => array(
						        'rule' => array('maxLength', '60'),				        
								'last' => true
				   				),  
		),
				
		'type' => array(
																								
						'notEmpty' => array(
						        'rule' => 'notEmpty',				        
								'last' => true
				   				),  
						
						'numeric' =>array(
								'rule'=>'numeric',
								'last' => true
								),

		),
				
		'thema' => array(
						'notEmpty' =>array(
								'rule'=>'notEmpty',
								'last' => true
								),
									       							
						'maxLength' => array(
						        'rule' => array('maxLength', '20'),				        
								'last' => true
				   				),  
		),
	
		'phono' => array(								       							
						'maxLength' => array(
						        'rule' => array('maxLength', '15'),				        
								'last' => true
				   				),  
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasMany = array(
		'Secproject' => array(
			'className' => 'Secproject',
			'foreignKey' => 'secorganization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Secrole' => array(
			'className' => 'Secrole',
			'foreignKey' => 'secorganization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),

	);
	
}
?>
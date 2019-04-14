<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('Auth','Acl','Buscador','Menu','Session', 'Calendario', 'Datos');
	public $helpers = array('Html','Form','Js','Session', 'Xhtml');
	public $uses = array('Secperson','Secassign','Secorganization','Secprogram');//supuestamente removido en cake 2.x
    public $datosLogeo,$treePanel;

	function beforeFilter()
	{

		$this->set('title_for_layout', 'Sistema de Circulo de Mejora Contínua');

		set_time_limit(1200);
              ini_set('memory_limit', '2024M');	
			  
		if(isset($this->request->data['Secperson']) && isset($this->request->data['Secassign']))
		{
			$this->request->data['Secassign']['secperson_id'] = $this->Secperson->field('id',array('username' => $this->request->data['Secperson']['username'],
																'password' => $this->Auth->password(strtolower($this->request->data['Secperson']['password']))));
			$this->request->data['Secassign']['fixticio'] = 'c€s@r1.';  
		}
		      
		if(isset($this->request->data['Secassign']['secperson_id']) && isset($this->request->data['Secassign']['secrole_id']) && isset($this->request->data['Secassign']['secproject_id']) )
						{$this->Auth->authenticate = array('Form' => array(
							                                        'userModel'=>'Secassign',
							                                        'fields' => array('username' => 'secperson_id','password' => 'fixticio'),
							                                        'scope'=>array('Secassign.secperson_id' => $this->request->data['Secassign']['secperson_id'],
											                                        'Secassign.secrole_id' => $this->request->data['Secassign']['secrole_id'],
											                                        'Secassign.secproject_id' => $this->request->data['Secassign']['secproject_id'],
											                                        'Secassign.status' => 'AC')
                                         ));                                                        
                        }
		
        $this->Auth->authorize = array(
                'Actions' => array('actionPath' => 'controllers','userModel'=>'Secassign')
            );
			
        $this->Auth->loginAction = array('controller' => 'secassigns', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'secassigns', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'home');

		$this->Auth->loginError = __('logioFallido',true);
		//$this->Auth->authError = $this->Session->setFlash(__('noAutoriazado'),'flash_failure');
		$this->Auth->authError = __('noAutoriazado',true);

		$this->Auth->allow(
							//Pagina de incio
							'home',		
							'display',						
							//Para password
							'login',
							'logout',
							'asignacion',
							'asignacionget',
							'listprojects',
							'listroles',
							'modificarpassword',
							'horaActual',
							'fechaActual'
		);
			
		$this->Auth->allow();
		
        $this->Session->write('Auth.redirect',null);           
        $secassign_id = $this->Auth->User('id');	
		//debug($this->Auth->User('id'));
		if(!empty($secassign_id))
		{
			$this->Secassign->recursive = 0;
			$this->datosLogeo = $this->Secassign->find('all',array(
				'fields' => array(
					'Secassign.id',
				    'Secperson.id',
					'Secperson.appaterno',
					'Secperson.apmaterno',
					'Secperson.firstname',
					'Secperson.username',
					'Secperson.password',
					'Secperson.email',
					'Secproject.id',
					'Secproject.name',
					'Secproject.secorganization_id',
					'Secrole.id',
					'Secrole.name'
																				   ),
																'conditions' => array('Secassign.id' => $secassign_id)
															)
												);
			//pr($this->datosLogeo);
			$this->Secorganization->recursive = -1;
			$secorganization = $this->Secorganization->findById($this->datosLogeo['0']['Secproject']['secorganization_id'],array('id','name', 'photo1'));

			$this->datosLogeo['0']['Secorganization']['name'] = $secorganization['Secorganization']['name'];
			$this->datosLogeo['0']['Secorganization']['id'] = $secorganization['Secorganization']['id'];

			$this->set('datosLogeo',$this->datosLogeo);
			$secrole_id = $this->Auth->user('secrole_id');
			$this->set('permisorolid',$secrole_id);
			$menu = $this->Secprogram->menu($secrole_id);
			// Script para generar el Menu en JSON
			//pr($menu);
			$url="http://".$_SERVER['HTTP_HOST'].$this->Webroot;
			$menuJson = $this->Menu->menuJson($menu,'secprograms',$url);                
			foreach($menuJson as $id => $item)
			{
				$treePanel[$id] = $item['secprograms']['listaDesordenada'];
			}
			$treePanel = isset($treePanel)?implode('', $treePanel):array();
			$this->set('treePanel',$treePanel);
			foreach($menu as $key => $etiqueta){
				if(empty($menu[$key]['secprograms']['solicitado'])){
					$menu[$key]['secprograms']['etiqueta'] = '<span>'.__($etiqueta['secprograms']['etiqueta']).'</span>';
				}
			}
			$menus = $this->Menu->agregarTagArbolold($menu,'secprograms','etiqueta');
			$this->set('menu',$menus);
			$logoEmpresa = $secorganization['Secorganization']['photo1'];
			$this->set('logoEmpresa', $logoEmpresa);
		}
	}

	function setInitSessionConditions($view = null){
		$controller = ucfirst(strtolower($this->request->params['controller']));
		$view = empty($view)?ucfirst(strtolower($this->request->params['action'])):ucfirst(strtolower($view));
		$page = empty($this->request->params['named']['page'])?'0':$this->request->params['named']['page'];
		if(empty($page)){
			if($this->Session->check("conditions.$controller.$view"))
				$this->Session->delete("conditions.$controller.$view");
		}
	}

	function setSessionConditions($dt, $view = null){
		$controller = ucfirst(strtolower($this->request->params['controller']));
		$view = empty($view)?ucfirst(strtolower($this->request->params['action'])):ucfirst(strtolower($view));
		$this->Session->write("conditions.$controller.$view",$dt);
	}

	function getSessionConditions($view = null){
		$controller = ucfirst(strtolower($this->request->params['controller']));
		$view = empty($view)?ucfirst(strtolower($this->request->params['action'])):ucfirst(strtolower($view));
		if($this->Session->check("conditions.$controller.$view")) return $this->Session->read("conditions.$controller.$view");
		else return array();
	}
	
	function _getDtLg(){
		$dtLog = $this->datosLogeo[0];
		$dtLog['userName'] = sprintf("%s %s, %s", $dtLog['Secperson']['appaterno'], $dtLog['Secperson']['apmaterno'], $dtLog['Secperson']['firstname']);
		$dtLog['role'] = $dtLog['Secrole']['name'];
		return $dtLog;
	}

}

<div class="row">
	<div class="col s12 m9 110">
	<div>
		<h4><?php echo __('Objetos de control solicitado');?></h4>

<?php	
		foreach($acos as $key => $aco)		
		{				
			if(!empty($aco['Aco']['alias']))
			{
				echo $aco['Aco']['listaDesordenada'];echo $aco['Aco']['alias'];	
				if($aco['Aco']['parent_id'] == 1 || empty($aco['Aco']['parent_id']))

					echo '&nbsp;'.$this->Html->link('<i class="mdi-av-my-library-add blue-text" title ="Agregar"></i>',
										  array('action'=>'agregar',$aco['Aco']['id']),
										  array('escape'=>false),
										  null);
				echo '&nbsp;'.$this->Html->link('<i class="mdi-editor-mode-edit green-text" title ="Editar"></i>',
										  array('action'=>'editar',$aco['Aco']['id']),
										  array('escape'=>false),
										  null);
				$mensaje = " 'Estas siguro que deseas eliminar el ACO ".$aco['Aco']['alias']." ?";			
				if($key != 0)
				echo '&nbsp;'.$this->Html->link('<i class="mdi-action-delete red-text" title ="Eliminar"></i>',
										  array('action'=>'eliminar',$aco['Aco']['id']),
										  array('escape'=>false),
										  $mensaje);										  
			}
			else
				echo $aco['Aco']['listaDesordenada'];
		}
	?>
	</div>
		
	</div>
</div>
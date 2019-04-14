<div class="row">
	<div class="col s12 m9 110">
	<div>
		<h4 class="header2"><?php echo __('Programas');?></h4>

<?php	foreach($programas as $key => $programa)		
		{
			if(!empty($programa['secprograms']['etiqueta']))
			{
				echo $programa['secprograms']['listaDesordenada'];echo $programa['secprograms']['etiqueta'];
				if(empty($programa['secprograms']['aco_id']))
					echo '&nbsp;'.$this->Html->link('<i class="mdi-av-my-library-add blue-text" title ="Agregar"></i>',
										  array('action'=>'add',$aro_id,$programa['secprograms']['id']),
										  array('escape'=>false),
										  null);	
				echo '&nbsp;'.$this->Html->link('<i class="mdi-editor-mode-edit green-text" title ="Editar"></i>',
										  array('action'=>'edit',$programa['secprograms']['id']),
										  array('escape'=>false),
										  null);
										  
				$mensaje = " 'Estas seguro que deseas eliminar el item ".$programa['secprograms']['etiqueta']." ?";			
				echo '&nbsp;'.$this->Html->link('<i class="mdi-action-delete red-text" title ="Eliminar"></i>',
										  array('action'=>'delete',$aro_id,$programa['secprograms']['id']),
										  array('escape'=>false),
										  $mensaje);
				if($programa['0']['arriba'] == 1)					  
				echo '&nbsp;'.$this->Html->link('<i class="mdi-hardware-keyboard-arrow-up pink-text" title ="Subir Item"></i>',
										  array('action'=>'up',$programa['secprograms']['id']),
										  array('escape'=>false),
										  null);
				if($programa['0']['abajo'] == 1)
				echo '&nbsp;'.$this->Html->link('<i class="mdi-hardware-keyboard-arrow-down deep-purple-text" title ="Bajar Item"></i>',
										  array('action'=>'down',$programa['secprograms']['id']),
										  array('escape'=>false),
										  null);
				
			}
			else
				echo $programa['secprograms']['listaDesordenada'];
		}		
?>
	</div>
		
	</div>
</div>


	<div class="input-field col s12">
<?php echo $this->Html->link('Nueva Raiz de menu', array('action'=>'add',$aro_id)); ?>
</div>
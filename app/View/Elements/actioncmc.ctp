
<?php 
	echo $this->Html->link('<i class="mdi-image-remove-red-eye blue-text" title ="Visualizar"></i>', array('action' => 'view', $id), array('escape'=>false)); 

	if( $asignado != 'SI')
		echo $this->Html->link('<i class="mdi-editor-mode-edit green-text" title ="Editar"></i>', array('action' => 'edit', $id), array('escape'=>false)); 

	/*if( $asignado != 'SI')
		echo $this->Form->postLink('<i class="mdi-action-delete red-text" title ="Eliminar"></i>', array('action' => 'delete', $id), array('escape'=>false), __('¿Estas seguro de eliminar este registro # %s?', $name));  */
?>
<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('Fuente');?></h4>
	<div class="row">

<table class="striped">
	<tbody>
		<tr>
		 	<td><label><?php echo __('Descripción'); ?></label> </td>
		 	<td><?php echo h($fuente['Fuente']['descripcion']); ?></td>
		 </tr>
		<tr>
		 	<td><label><?php echo __('Evidencia'); ?></label> </td>
		 	<td><?php echo h($fuente['Evidencia']['descripcion']); ?></td>
		 </tr>
		<tr>
		 	<td><label><?php echo __('Procedimiento'); ?></label> </td>
		 	<td><?php echo h($fuente['Procedimiento']['descripcion']); ?></td>
		 </tr>
	</tbody>
</table>

	<div class="input-field center col s12">
	<?php  echo $this->Html->link(__('cerrar',true), 'index',array('class'=>'waves-effect waves-light btn pink')); ?>
	</div>
	
	</div>
	</div>
</div>
</div>
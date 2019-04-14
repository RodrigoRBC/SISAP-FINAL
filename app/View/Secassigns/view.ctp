<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php  echo __('asignacion');?></h4>
	<div class="row">

	<table class="striped">
		<tbody>
			<tr>
		 		<td class="span-3" ><label><?php echo __('organizacion') ?></label></td>
		 		<td class="span-4 last"><?php echo $secassign['Secorganization']['name']; ?></td>
			</tr>
			
			<tr>
		 		<td><label><?php echo __('sucursal') ?></label></td>
		 		<td><?php echo $secassign['Secproject']['name']; ?>	
			</tr>

			<tr>
		 		<td><label><?php echo __('rol') ?></label></td>
		 		<td><?php echo $secassign['Secrole']['name']; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('apellidoNombre') ?></label></td>
		 		<td><?php echo $secassign['Secperson']['appaterno'].
													' '.$secassign['Secperson']['apmaterno'].
													', '.$secassign['Secperson']['firstname']; ?>	
			</tr>
			<tr>
		 		<td><label><?php echo __('usuario') ?></label></td>
		 		<td><?php echo $secassign['Secperson']['username']; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('estado'); ?></label> </td>
		 		<td>
		 			<?php echo $secassign['Secassign']['status'] == 'AC' ? 
							__('Enable',true)
						:
							($secassign['Secassign']['status'] == 'DE'?
								__('Disable',true)
							:
								__('Limited',true))
						; ?>
		 		</td>
		 	</tr>
		</tbody>
	</table>
	
	<div class="input-field center col s12">
	<?php  echo $this->Html->link(__('cerrar',true), 'index',array('class'=>'waves-effect waves-light btn')); ?>
	</div>
	
	</div>
	</div>
</div>
</div>


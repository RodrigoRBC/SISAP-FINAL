<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php  echo __('rolVer');?></h4>
	<div class="row">

	<table class="striped">
		<tbody>
			<tr>
		 		<td><label><?php echo __('organizacion') ?></label></td>
		 		<td><?php echo  $secrole['Secorganization']['name']; ?></td>
		 	</tr>

			<tr>
		 		<td><label><?php echo __('codigo') ?></label> </td>
		 		<td><?php echo $secrole['Secrole']['code']; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('nombre') ?></label> </td>
		 		<td><?php echo $secrole['Secrole']['name']; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('estado'); ?></label> </td>
		 		<td><?php echo $secrole['Secrole']['status'] == 'AC' ? 
							__('Enable',true)
						:
							($secrole['Secrole']['status'] == 'DE'?
								__('Disable',true)
							:
								__('Limited',true))
						; ?></td>
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

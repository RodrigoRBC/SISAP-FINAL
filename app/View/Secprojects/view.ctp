<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php  echo __('ProjectVer');?></h4>
	<div class="row">

	<table class="striped">
		<tbody>
			<tr>
		 		<td class="span-3" ><label><?php echo __('organizacion') ?></label></td>
		 		<td class="span-4 last"><?php echo $secproject['Secorganization']['name']; ?></td>
		 	</tr>

			<tr>
		 		<td><label><?php echo __('codigo') ?></label> </td>
		 		<td><?php echo $secproject['Secproject']['code']; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('nombre') ?></label> </td>
		 		<td><?php echo $secproject['Secproject']['name']; ?></td>
		 	</tr>			
			<tr>
		 		<td><label><?php echo __('ProjectPhoto1') ?></label> </td>
		 		<td><?php echo $secproject['Secproject']['photo1']; ?></td>
		 	</tr>			
			<tr>
		 		<td><label><?php echo __('ProjectPhoto2') ?></label> </td>
		 		<td><?php echo $secproject['Secproject']['photo1']; ?></td>
		 	</tr>			
			<tr>
		 		<td><label><?php echo __('ProjectText1') ?></label> </td>
		 		<td><?php echo $secproject['Secproject']['text1']; ?></td>
		 	</tr>			
			<tr>
		 		<td><label><?php echo __('ProjectText2') ?></label> </td>
		 		<td><?php echo  $secproject['Secproject']['text2']; ?></td>
		 	</tr>			
			<tr>
		 		<td><label><?php echo __('direccion') ?></label> </td>
		 		<td><?php echo $secproject['Secproject']['address']; ?></td>
		 	</tr>			
			<tr>
		 		<td><label><?php echo __('telefono') ?></label> </td>
		 		<td><?php echo  $secproject['Secproject']['phono']; ?></td>
		 	</tr>			


			<tr>
		 		<td><label><?php echo __('estado'); ?></label> </td>
		 		<td><?php echo $secproject['Secproject']['status'] == 'AC' ? 
							__('Enable',true)
						:
							($secproject['Secproject']['status'] == 'DE'?
								__('Disable',true)
							:
								__('Limited',true))
						; ?></td>
		 	</tr>
		</tbody>
	</table>
		
		<div class="input-field center col s12">
			<?php  echo $this->Html->link(__('cerrar'),'index',array('class'=>'waves-effect waves-light btn')); ?>
		</div>
	
	</div>
	</div>
</div>
</div>
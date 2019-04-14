<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('organizacion');?></h4>
	<div class="row">
	
	<table class="striped">
		<tbody>
			<tr>
		 		<td class="span-3" ><label><?php echo  __('codigo') ?></label></td>
		 		<td class="span-4 last"><?php echo $secorganization['Secorganization']['code']; ?></td>
		 	</tr>

			<tr>
		 		<td><label><?php echo __('nombre') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['name']; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('nombre') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['name']; ?></td>
		 	</tr>
			
			<tr>
			<tr>
		 		<td><label><?php echo  __('empresaType') ?></label></td>
		 		<td>
						<?php echo 
							$secorganization['Secorganization']['type'] == 0? __('propia', true): 
								 $secorganization['Secorganization']['type']== 1? __('cliente', TRUE): __('proveedor',TRUE);
						?>
				</td>
		 	</tr>				
				
		 		<td><label><?php echo __('empresaThema') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['thema']; ?></td>
		 	</tr>						
			<tr>
		 		<td><label><?php echo __('empresaEncabezado') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['photo1']; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('empresaPhoto1') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['photo1']; ?></td>
		 	</tr>						
			<tr>
		 		<td><label><?php echo __('empresaPhoto2') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['photo2']; ?></td>
		 	</tr>						
			<tr>
		 		<td><label><?php echo __('empresaText1') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['text1']; ?></td>
		 	</tr>				
			<tr>
		 		<td><label><?php echo __('empresaText2') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['text2']; ?></td>
		 	</tr>				
			<tr>
		 		<td><label><?php echo __('empresaAdress') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['address']; ?></td>
		 	</tr>				
			<tr>
		 		<td><label><?php echo __('empresaPhone') ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['phono']; ?></td>
		 	</tr>				
			<tr>
		 		<td><label><?php echo __('estado'); ?></label> </td>
		 		<td><?php echo $secorganization['Secorganization']['status'] == 'AC' ? 
							__('Enable',true)
						:
							($secorganization['Secorganization']['status'] == 'DE'?
								__('Disable',true)
							:
								__('Limited',true))
						; ?></td>
		 	</tr>
		</tbody>
	</table>	
	<div class="input-field center col s12">
	<?php  echo $this->Html->link(__('cerrar',true),'index', array('class'=>'waves-effect waves-light btn')); ?>
	</div>

	<div class="input-field col s12">
	<?php 		
		if($tieneroles){
		//$url = $this->Html->url(array('action'=>'mostrarroles', $secorganization['Secorganization']['id']));
		echo $this->Html->link(__('Ver roles de esta Empresa',true), array('action'=>'mostrarroles', $secorganization['Secorganization']['id']));
		}
		else echo (__('empresaSinRoles',true));
?>		&nbsp;

<?php 		
		if($tieneroles){
		//$url = $this->Html->url(array('action'=>'mostrarsucursales', $secorganization['Secorganization']['id']));
		echo $this->Html->link(__('empresaSucursales',true), array('action'=>'mostrarsucursales', $secorganization['Secorganization']['id']));
		}
		else echo (__('empresaSinSucursales'));
?>		&nbsp;
	</div>
	
	</div>
	</div>
</div>
</div>


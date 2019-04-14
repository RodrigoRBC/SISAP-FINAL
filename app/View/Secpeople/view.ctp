<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('persona');?></h4>
	<div class="row">

	<table class="striped">
		<tbody>
			<tr>
		 		<td class="span-3" ><label><?php echo __('apellidoNombre') ?></label></td>
		 		<td class="span-4 last"><?php $ApNom = $secperson['Secperson']['appaterno']." ".
												 $secperson['Secperson']['apmaterno'].", ".
												 $secperson['Secperson']['firstname']; 
												 echo $ApNom;?></td>
		 	</tr>

			<tr>
		 		<td><label><?php echo __('privilegio') ?></label> </td>
		 		<td><?php echo $secperson['Secperson']['privelege']; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('lenguaje') ?></label></td>
		 		<td><?php echo $secperson['Secperson']['language'] == 'spa' ?
							__('castellano', true)
						:
							$secperson['Secperson']['language'];
			; ?>
				</td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('estado'); ?></label> </td>
		 		<td><?php echo $secperson['Secperson']['status'] == 'AC' ? 
							__('Enable',true)
						:
							($secperson['Secperson']['status'] == 'DE'?
								__('Disable',true)
							:
								__('Limited',true))
						; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('fechaCreacion') ?></label> </td>
		 		<td><?php echo $secperson['Secperson']['creationdate']; ?></td>
		 	</tr>
			<tr>
		 		<td><label><?php echo __('fechaCierre') ?></label> </td>
		 		<td> <?php echo $secperson['Secperson']['expirationdate']; ?></td>
		 	</tr>
		</tbody>
	</table>

	<br/>

			
	<table class="striped">
		<thead>
			<tr>
				<th>Empresa</th>
				<th>Sucursal</th> 
				<th>Rol</th>
			</tr>
		</thead>
		<tbody>
				<?php foreach($personDetalle as $key => $Value): ?>
					<tr>
						<td> <?php echo $Value['Secorganization']['name']; ?></td>
						<td> <?php echo $Value['Secproject']['name']; ?></td>
						<td> <?php echo $Value['Secrole']['name']; ?></td>
					</tr>
				<?php endforeach ?>
		</tbody>
	</table>
	
	<div class="input-field center col s12">
	<?php  echo $this->Html->link(__('cerrar',true), 'index',array('class'=>'waves-effect waves-light btn')); ?>
	</div>
	
	</div>
	</div>
</div>
</div>
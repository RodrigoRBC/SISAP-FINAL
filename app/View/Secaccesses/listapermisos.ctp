<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo $grupo_usuario; ?></h4>
	<div class="row">

<?php if($listaDePermisosPrincipal):  ?>
		<table class='striped'>
		<thead>
		<tr>
			<th><?php echo 'Controlador';?></th>
			<th><?php echo 'Acciones';?></th>
			<th><?php echo 'Acceso';?></th>
			<th><?php echo 'Acciones';?></th>
		</tr>
		</thead>
		<tbody>
	<?php foreach($listaDePermisosPrincipal as $PermisoPrincipal): ?>
		<tr>
			<td>
				<?php echo $PermisoPrincipal['listaDePermisos']['controlador']; ?>
			</td>
			<td>
				<?php echo $PermisoPrincipal['listaDePermisos']['acciones']; ?>
			</td>
			<td>
				<?php if($PermisoPrincipal['listaDePermisos']['aros_acos_acceso'] == 1) 
							echo 'Permitido'; 
					  else 	
					  		echo 'Denegado';
				?>
			</td>
			<td>
				<?php 
				IF($PermisoPrincipal['listaDePermisos']['aros_acos_acceso'] == 1) 
					echo $this->Html->link('<i class="mdi-notification-do-not-disturb small purple-text" title ="DENEGAR"></i>',array('controller'=>'Secaccesses','action'=>'denegarpermiso',1,
						$PermisoPrincipal['listaDePermisos']['aros_id'],
						$PermisoPrincipal['listaDePermisos']['acos_id']),array('escape'=>false),
										  null); 
				ELSE 	
					echo $this->Html->link('<i class="mdi-maps-beenhere small green-text" title ="PERMITIR"></i>',array('controller'=>'Secaccesses','action'=>'permitir',1,
						$PermisoPrincipal['listaDePermisos']['aros_id'],
						$PermisoPrincipal['listaDePermisos']['acos_id']),array('escape'=>false),
										  null);  ?>
				
				<?php echo $this->Html->link('<i class="mdi-content-clear small red-text" title ="CANCELAR"></i>', array('action'=>'cancelar',
						$PermisoPrincipal['listaDePermisos']['aros_id'],
						$PermisoPrincipal['listaDePermisos']['acos_id']),
						array('escape'=>false), 'Esta seguro que desea cancelar este registro?'); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
		</table>
<?php endif; ?>
		

<?php if($listaDePermisosHeredado): { ?>
<?php foreach($listaDePermisosHeredado as $PermisosHeredado): ?>
<h5 class="header2">Permisos Heredados por su Grupo: <?php echo $PermisosHeredado['listaDePermisos']['aros_alias']; ?></h5>
<?php endforeach; }?>
<table class="striped">
<tr>
	<th><?php echo 'Controlador';?></th>
	<th><?php echo 'Acciones';?></th>
	<th><?php echo 'Acceso';?></th>
</tr>

<?php foreach($listaDePermisosHeredado as $PermisoHeredado): ?>
<tr>
	<td>
		<?php echo $PermisoHeredado['listaDePermisos']['controlador']; ?>
	</td>
	<td>
		<?php echo $PermisoHeredado['listaDePermisos']['acciones']; ?>
	</td>
	<td>
		<?php IF($PermisoHeredado['listaDePermisos']['aros_acos_acceso'] == 1) 
					echo 'Permitido'; 
			  ELSE echo 'Denegado';?>
	</td>	
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
		<div class="input-field col s12">
			<br/>
			<?php echo $this->Html->link('Agregar Permisos',array('controller'=>'Secaccesses','action'=>'accederpermiso',$aros_id)); ?>
		</div>
		
		<div class="input-field col s12">
		<br/>
		<?php echo $this->Html->link('Lista de Accesos',array('controller'=>'Secaccesses','action'=>'listaccess')); ?>
		</div>
</div>
</div>
</div>
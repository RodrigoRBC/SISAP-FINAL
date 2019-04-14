<?php echo $this->Session->flash();?>

<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('Docentes por Asignar',true));?></h4>			

<div class="left">
<div class="input-field col s6">
	<div class="row">
	<div class="input-field col s3">
	<?php 	
		$url = isset($url)?$url:'addind';

		echo $this->Html->link('<i class="mdi-av-my-library-add blue-text" title ="Agregar"></i>', 
					array('action'=>'addind'), array('escape'=>false)); 
	?>
	</div>
		&nbsp;
	<div class="input-field col s3">
		<?php 
			echo $this->Html->link(__('Add', true),array("action"=>$url)); 
		?>
	</div>		
	</div>
</div>
</div>
				
	<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'indexdocentes')); ?>

<?php if(isset($secassigns) && !empty($secassigns)): ?>
<table class="table-responsive-vertical striped">
	<thead>
		<tr>
			<th><?php echo __('organizacion', true); ?></th>
			<th><?php echo $this->Paginator->sort(__('sucursal', true)); ?></th>
			<th><?php echo $this->Paginator->sort(__('rol', true)); ?></th>
			<th><?php echo $this->Paginator->sort(__('persona', true)); ?></th>
			<th><?php echo __('usuario', true); ?></th>
			<th><?php echo $this->Paginator->sort(__('estado', true)); ?></th>
			<th class="actions"><?php echo __('Actions', true); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($secassigns as $secassign):
			$status = $secassign['Secassign']['status']; ?>
		<tr>
			<td><?php echo $secassign['Secorganization']['name']; ?></td>
			<td><?php echo $secassign['Secproject']['name']; ?></td>
			<td><?php echo $secassign['Secrole']['name']; ?></td>
			<td>
				<?php echo $secassign['Secperson']['appaterno'].' '.$secassign['Secperson']['apmaterno'].', '.$secassign['Secperson']['firstname']; ?>
			</td>
			<td><?php echo $secassign['Secperson']['username']; ?></td>
			<td>
				<?php echo $status == 'AC' ? __('Enable', true) : ($status == 'DE' ? __('Disable', true) : __('Limited', true)); ?>
			</td>
			<td class="actions">				

<?php 
	echo $this->Html->link('<i class="mdi-editor-mode-edit green-text" title ="Editar"></i>', array('action' => 'editind', $secassign['Secassign']['id']), array('escape'=>false));  
?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>
<?php echo $this->element('paginador'); ?>
</div>
</div>
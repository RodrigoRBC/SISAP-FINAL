<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('Tecnicos de CMC',true));?></h4>		
				
	<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'indexevaluacion')); ?>

<?php if(isset($secassigns) && !empty($secassigns)): ?>
<table class="striped">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort(__('Tecnico', true)); ?></th>
			<th><?php echo __('Facultad', true); ?></th>
			<th><?php echo $this->Paginator->sort(__('Escuela', true)); ?></th>
			<th><?php echo $this->Paginator->sort(__('rol', true)); ?></th>
			<th><?php echo __('usuario', true); ?></th>
			<th><?php echo $this->Paginator->sort(__('estado', true)); ?></th>
			<th class="actions"><?php echo __('Actions', true); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($secassigns as $secassign):
			$status = $secassign['Secassign']['status']; ?>
		<tr>
			<td>
				<?php echo $secassign['Secperson']['appaterno'].' '.$secassign['Secperson']['apmaterno'].', '.$secassign['Secperson']['firstname']; ?>
			</td>
			<td><?php echo $secassign['Secorganization']['name']; ?></td>
			<td><?php echo $secassign['Secproject']['name']; ?></td>
			<td><?php echo $secassign['Secrole']['name']; ?></td>
			<td><?php echo $secassign['Secperson']['username']; ?></td>
			<td>
				<?php echo $status == 'AC' ? __('Enable', true) : ($status == 'DE' ? __('Disable', true) : __('Limited', true)); ?>
			</td>
			<td class="actions">	
				<?php //if($secassign['Secperson']['generated']==1) 
				echo $this->Html->link(__('Evaluar'), array('controller'=>'historialreportes','action' => 'indexevaluador', $secassign['Secassign']['id']),array('class'=>'waves-effect waves-light btn pink')); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>
<?php echo $this->element('paginador'); ?>
</div>
</div>
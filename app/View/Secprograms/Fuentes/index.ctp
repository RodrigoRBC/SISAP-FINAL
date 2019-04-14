<?php echo $this->Session->flash();?>

<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('Fuentes de SGC (Modelo AUDIT)',true));?></h4>	

	<?php echo $this->Element('agregar'); ?>

					
	<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'index')); ?>
	

<table class="striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('procedimiento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('evidencia_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($fuentes as $fuente): ?>
	<tr>
		<td><?php echo h($fuente['Fuente']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $fuente['Fuente']['descripcion']; ?>
		</td>
		<td>
			<?php echo $fuente['Procedimiento']['descripcion']; ?>
			<?php //echo $this->Html->link($grupo['Escuela']['descripcion'], array('controller' => 'escuelas', 'action' => 'view', $grupo['Escuela']['id'])); ?>
		</td>
		<td>
			<?php echo $fuente['Evidencia']['descripcion']; ?>
			<?php //echo $this->Html->link($grupo['Direccione']['id'], array('controller' => 'direcciones', 'action' => 'view', $grupo['Direccione']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $fuente['Fuente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $fuente['Fuente']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $fuente['Fuente']['id']), array(), __('Are you sure you want to delete # %s?', $fuente['Fuente']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
<?php echo $this->element('paginador'); ?>
</div>
</div>
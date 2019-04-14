<div class="arbpeople index">
	<h2><?php echo __('Arbpeople'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('arbubigeo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dni'); ?></th>
			<th><?php echo $this->Paginator->sort('names'); ?></th>
			<th><?php echo $this->Paginator->sort('first_surname'); ?></th>
			<th><?php echo $this->Paginator->sort('second_surname'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($arbpeople as $arbperson): ?>
	<tr>
		<td><?php echo h($arbperson['Arbperson']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($arbperson['Arbubigeo']['id'], array('controller' => 'arbubigeos', 'action' => 'view', $arbperson['Arbubigeo']['id'])); ?>
		</td>
		<td><?php echo h($arbperson['Arbperson']['dni']); ?>&nbsp;</td>
		<td><?php echo h($arbperson['Arbperson']['names']); ?>&nbsp;</td>
		<td><?php echo h($arbperson['Arbperson']['first_surname']); ?>&nbsp;</td>
		<td><?php echo h($arbperson['Arbperson']['second_surname']); ?>&nbsp;</td>
		<td><?php echo h($arbperson['Arbperson']['status']); ?>&nbsp;</td>
		<td><?php echo h($arbperson['Arbperson']['created']); ?>&nbsp;</td>
		<td><?php echo h($arbperson['Arbperson']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $arbperson['Arbperson']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $arbperson['Arbperson']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $arbperson['Arbperson']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $arbperson['Arbperson']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Arbperson'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Arbubigeos'), array('controller' => 'arbubigeos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbubigeo'), array('controller' => 'arbubigeos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbrates'), array('controller' => 'arbrates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbrate'), array('controller' => 'arbrates', 'action' => 'add')); ?> </li>
	</ul>
</div>

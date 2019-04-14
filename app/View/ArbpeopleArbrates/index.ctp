<div class="arbpeopleArbrates index">
	<h2><?php echo __('Arbpeople Arbrates'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('arbperson_id'); ?></th>
			<th><?php echo $this->Paginator->sort('arbrate_id'); ?></th>
			<th><?php echo $this->Paginator->sort('arbitration_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_status'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_date'); ?></th>
			<th><?php echo $this->Paginator->sort('document'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($arbpeopleArbrates as $arbpeopleArbrate): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($arbpeopleArbrate['Arbperson']['id'], array('controller' => 'arbpeople', 'action' => 'view', $arbpeopleArbrate['Arbperson']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($arbpeopleArbrate['Arbrate']['id'], array('controller' => 'arbrates', 'action' => 'view', $arbpeopleArbrate['Arbrate']['id'])); ?>
		</td>
		<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['arbitration_rate']); ?>&nbsp;</td>
		<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['payment_status']); ?>&nbsp;</td>
		<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['payment_date']); ?>&nbsp;</td>
		<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['document']); ?>&nbsp;</td>
		<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['status']); ?>&nbsp;</td>
		<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['created']); ?>&nbsp;</td>
		<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $arbpeopleArbrate['ArbpeopleArbrate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $arbpeopleArbrate['ArbpeopleArbrate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $arbpeopleArbrate['ArbpeopleArbrate']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $arbpeopleArbrate['ArbpeopleArbrate']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Arbpeople Arbrate'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Arbpeople'), array('controller' => 'arbpeople', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbperson'), array('controller' => 'arbpeople', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbrates'), array('controller' => 'arbrates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbrate'), array('controller' => 'arbrates', 'action' => 'add')); ?> </li>
	</ul>
</div>

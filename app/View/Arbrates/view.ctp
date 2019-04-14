<div class="arbrates view">
<h2><?php echo __('Arbrate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($arbrate['Arbrate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Cost'); ?></dt>
		<dd>
			<?php echo h($arbrate['Arbrate']['total_cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number Of Inhabitants'); ?></dt>
		<dd>
			<?php echo h($arbrate['Arbrate']['number_of_inhabitants']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year And Month'); ?></dt>
		<dd>
			<?php echo h($arbrate['Arbrate']['year_and_month']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monthly Rate'); ?></dt>
		<dd>
			<?php echo h($arbrate['Arbrate']['monthly_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($arbrate['Arbrate']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($arbrate['Arbrate']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($arbrate['Arbrate']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Arbrate'), array('action' => 'edit', $arbrate['Arbrate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Arbrate'), array('action' => 'delete', $arbrate['Arbrate']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $arbrate['Arbrate']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbrates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbrate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbpeople'), array('controller' => 'arbpeople', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbperson'), array('controller' => 'arbpeople', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Arbpeople'); ?></h3>
	<?php if (!empty($arbrate['Arbperson'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Arbubigeo Id'); ?></th>
		<th><?php echo __('Dni'); ?></th>
		<th><?php echo __('Names'); ?></th>
		<th><?php echo __('First Surname'); ?></th>
		<th><?php echo __('Second Surname'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($arbrate['Arbperson'] as $arbperson): ?>
		<tr>
			<td><?php echo $arbperson['id']; ?></td>
			<td><?php echo $arbperson['arbubigeo_id']; ?></td>
			<td><?php echo $arbperson['dni']; ?></td>
			<td><?php echo $arbperson['names']; ?></td>
			<td><?php echo $arbperson['first_surname']; ?></td>
			<td><?php echo $arbperson['second_surname']; ?></td>
			<td><?php echo $arbperson['status']; ?></td>
			<td><?php echo $arbperson['created']; ?></td>
			<td><?php echo $arbperson['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'arbpeople', 'action' => 'view', $arbperson['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'arbpeople', 'action' => 'edit', $arbperson['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'arbpeople', 'action' => 'delete', $arbperson['id']), array('confirm' => __('Are you sure you want to delete # %s?', $arbperson['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Arbperson'), array('controller' => 'arbpeople', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

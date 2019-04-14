<div class="arbpeople view">
<h2><?php echo __('Arbperson'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($arbperson['Arbperson']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arbubigeo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($arbperson['Arbubigeo']['id'], array('controller' => 'arbubigeos', 'action' => 'view', $arbperson['Arbubigeo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dni'); ?></dt>
		<dd>
			<?php echo h($arbperson['Arbperson']['dni']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Names'); ?></dt>
		<dd>
			<?php echo h($arbperson['Arbperson']['names']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Surname'); ?></dt>
		<dd>
			<?php echo h($arbperson['Arbperson']['first_surname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Second Surname'); ?></dt>
		<dd>
			<?php echo h($arbperson['Arbperson']['second_surname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($arbperson['Arbperson']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($arbperson['Arbperson']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($arbperson['Arbperson']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Arbperson'), array('action' => 'edit', $arbperson['Arbperson']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Arbperson'), array('action' => 'delete', $arbperson['Arbperson']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $arbperson['Arbperson']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbpeople'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbperson'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbubigeos'), array('controller' => 'arbubigeos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbubigeo'), array('controller' => 'arbubigeos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbrates'), array('controller' => 'arbrates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbrate'), array('controller' => 'arbrates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Arbrates'); ?></h3>
	<?php if (!empty($arbperson['Arbrate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Total Cost'); ?></th>
		<th><?php echo __('Number Of Inhabitants'); ?></th>
		<th><?php echo __('Year And Month'); ?></th>
		<th><?php echo __('Monthly Rate'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($arbperson['Arbrate'] as $arbrate): ?>
		<tr>
			<td><?php echo $arbrate['id']; ?></td>
			<td><?php echo $arbrate['total_cost']; ?></td>
			<td><?php echo $arbrate['number_of_inhabitants']; ?></td>
			<td><?php echo $arbrate['year_and_month']; ?></td>
			<td><?php echo $arbrate['monthly_rate']; ?></td>
			<td><?php echo $arbrate['status']; ?></td>
			<td><?php echo $arbrate['created']; ?></td>
			<td><?php echo $arbrate['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'arbrates', 'action' => 'view', $arbrate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'arbrates', 'action' => 'edit', $arbrate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'arbrates', 'action' => 'delete', $arbrate['id']), array('confirm' => __('Are you sure you want to delete # %s?', $arbrate['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Arbrate'), array('controller' => 'arbrates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

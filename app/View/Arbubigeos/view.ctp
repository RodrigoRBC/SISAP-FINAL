<div class="arbubigeos view">
<h2><?php echo __('Arbubigeo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($arbubigeo['Arbubigeo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($arbubigeo['Arbubigeo']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo h($arbubigeo['Arbubigeo']['district']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
			<?php echo h($arbubigeo['Arbubigeo']['province']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($arbubigeo['Arbubigeo']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($arbubigeo['Arbubigeo']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($arbubigeo['Arbubigeo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($arbubigeo['Arbubigeo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Arbubigeo'), array('action' => 'edit', $arbubigeo['Arbubigeo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Arbubigeo'), array('action' => 'delete', $arbubigeo['Arbubigeo']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $arbubigeo['Arbubigeo']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbubigeos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbubigeo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbpeople'), array('controller' => 'arbpeople', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbperson'), array('controller' => 'arbpeople', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Arbpeople'); ?></h3>
	<?php if (!empty($arbubigeo['Arbperson'])): ?>
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
	<?php foreach ($arbubigeo['Arbperson'] as $arbperson): ?>
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

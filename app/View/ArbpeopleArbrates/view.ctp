<div class="arbpeopleArbrates view">
<h2><?php echo __('Arbpeople Arbrate'); ?></h2>
	<dl>
		<dt><?php echo __('Arbperson'); ?></dt>
		<dd>
			<?php echo $this->Html->link($arbpeopleArbrate['Arbperson']['id'], array('controller' => 'arbpeople', 'action' => 'view', $arbpeopleArbrate['Arbperson']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arbrate'); ?></dt>
		<dd>
			<?php echo $this->Html->link($arbpeopleArbrate['Arbrate']['id'], array('controller' => 'arbrates', 'action' => 'view', $arbpeopleArbrate['Arbrate']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arbitration Rate'); ?></dt>
		<dd>
			<?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['arbitration_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Status'); ?></dt>
		<dd>
			<?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['payment_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Date'); ?></dt>
		<dd>
			<?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['payment_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document'); ?></dt>
		<dd>
			<?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['document']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Arbpeople Arbrate'), array('action' => 'edit', $arbpeopleArbrate['ArbpeopleArbrate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Arbpeople Arbrate'), array('action' => 'delete', $arbpeopleArbrate['ArbpeopleArbrate']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $arbpeopleArbrate['ArbpeopleArbrate']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbpeople Arbrates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbpeople Arbrate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbpeople'), array('controller' => 'arbpeople', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbperson'), array('controller' => 'arbpeople', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbrates'), array('controller' => 'arbrates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbrate'), array('controller' => 'arbrates', 'action' => 'add')); ?> </li>
	</ul>
</div>

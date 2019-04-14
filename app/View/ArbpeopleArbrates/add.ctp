<div class="arbpeopleArbrates form">
<?php echo $this->Form->create('ArbpeopleArbrate'); ?>
	<fieldset>
		<legend><?php echo __('Add Arbpeople Arbrate'); ?></legend>
	<?php
		echo $this->Form->input('arbperson_id');
		echo $this->Form->input('arbrate_id');
		echo $this->Form->input('arbitration_rate');
		echo $this->Form->input('payment_status');
		echo $this->Form->input('payment_date');
		echo $this->Form->input('document');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Arbpeople Arbrates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Arbpeople'), array('controller' => 'arbpeople', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbperson'), array('controller' => 'arbpeople', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbrates'), array('controller' => 'arbrates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbrate'), array('controller' => 'arbrates', 'action' => 'add')); ?> </li>
	</ul>
</div>

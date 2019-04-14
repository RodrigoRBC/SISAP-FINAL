<div class="arbubigeos form">
<?php echo $this->Form->create('Arbubigeo'); ?>
	<fieldset>
		<legend><?php echo __('Add Arbubigeo'); ?></legend>
	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('district');
		echo $this->Form->input('province');
		echo $this->Form->input('department');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Arbubigeos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Arbpeople'), array('controller' => 'arbpeople', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbperson'), array('controller' => 'arbpeople', 'action' => 'add')); ?> </li>
	</ul>
</div>

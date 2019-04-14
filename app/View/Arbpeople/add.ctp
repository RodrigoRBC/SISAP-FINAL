<div class="arbpeople form">
<?php echo $this->Form->create('Arbperson'); ?>
	<fieldset>
		<legend><?php echo __('Add Arbperson'); ?></legend>
	<?php
		echo $this->Form->input('arbubigeo_id');
		echo $this->Form->input('dni');
		echo $this->Form->input('names');
		echo $this->Form->input('first_surname');
		echo $this->Form->input('second_surname');
		echo $this->Form->input('status');
		echo $this->Form->input('Arbrate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Arbpeople'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Arbubigeos'), array('controller' => 'arbubigeos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbubigeo'), array('controller' => 'arbubigeos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Arbrates'), array('controller' => 'arbrates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arbrate'), array('controller' => 'arbrates', 'action' => 'add')); ?> </li>
	</ul>
</div>

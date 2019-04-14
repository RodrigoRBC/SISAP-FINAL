
<div class="ui right floated segment">
	<?php echo $this->Form->create('Buscar',array('url' =>$url,'class'=>'ui form'));?>
	<div class="ui input">
		<?php echo $this->Form->label(__('desactivo')); ?>
	</div>
	<div class="ui input">
		<?php echo $this->Form->checkbox('desactivo'); ?>
	</div>
	<div class="ui input">
		<?php echo $this->Form->select('buscador',$elementos,array('class'=>'buscador','empty'=>FALSE)); ?>
	</div>
	<div class="ui icon input">
	    <?php echo $this->Form->text('valor', array('id'=>'ingreso','class'=>'prompt','placeholder'=>"Buscar"));?>
	  	<i class="inverted circular calendar link icon" id='lanzador'></i>
	</div>
	<div class="ui input">
		<?php echo $this->Form->submit(__('Search'),array('div'=>false));?>
	</div>
	<?php echo $this->Form->end();?>
</div>
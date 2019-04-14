
<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('acosEditar');?></h4>
	<div class="row">
	<?php echo $this->Form->create('Aco', array('action' => 'editar','class'=>'col s12'));?>
	<?php echo $this->Form->hidden('id'); ?>
	<div class="row">
	  <div class="input-field col s12">
		<?php echo $this->Form->text('alias',array('required'=>'required'));?>
	    <label for="AcoAlias"><?php echo __('acosAlias').'*'; ?></label> 
	  </div>
	  <div class="input-field col s12">
		<?php echo $this->Form->text('descripcion');?>
	    <label for="AcoDescripcion"><?php echo __('acosDescripcion'); ?></label> 	
	  </div>
	  <div class="col s12">
	  	<p>
	    	<?php echo $this->Form->checkbox('paramenu',array('class'=>'filled-in'));?>	
	     	<label for="AcoParamenu"><?php echo __('acosParaMenu'); ?></label>
	  	<p>
	  </div>
	  <div class="input-field col s12">
	  	<?php echo $this->Form->submit(__('Submit'), array('class'=>'waves-effect waves-light btn','id'=>'Acosbtn'));	?>
	  </div>
	</div>
	<?php echo $this->Form->end();?>
	</div>
	</div>

	<div class="input-field col s12">
		<ul>
			<li><?php echo $this->Html->link(__('acosListaObjetos'), array('action'=>'index'));?></li>
		</ul>
	</div>

</div>
</div>



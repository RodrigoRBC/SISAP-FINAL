
<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('Item de Programa');?></h4>
	<div class="row">
	<?php echo $this->Form->create('Secprogram', array('action' => 'add','class'=>'col s12'));?>
	<?php echo $this->Form->hidden('aro_id'); ?>
	<?php echo $this->Form->hidden('parent_id'); ?>
		<div class="row">
		  <div class="input-field col s12">
			<?php echo $this->Form->text('etiqueta',array('required'=>'required'));?>
		    <label for="SecprogramEtiqueta"><?php echo __('Etiqueta').'*'; ?></label> 
		  </div>
		  <div class="input-field col s12">
			<?php echo $this->Form->select('aco_id',$acosParaMenu,array('empty'=>'seleccione'));?>	
		    <label for="SecprogramAcoId"><?php echo __('Programa'); ?></label> 
		  </div>
		  <div class="input-field col s12">
		  	<?php echo $this->Form->submit(__('Submit'), array('class'=>'waves-effect waves-light btn'));	?> 
		  </div>
		</div>
	<?php echo $this->Form->end();?>
	</div>
	</div>

	<div class="input-field col s12">
		<ul>			
			<li><?php echo $this->Html->link('Lista De Programas', array('action'=>'listprograms',$this->data['Secprogram']['aro_id']));?></li>
		</ul>
	</div>

</div>
</div>




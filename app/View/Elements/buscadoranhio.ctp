
<div class="right">
	<?php echo $this->Form->create('Buscar',array('url' =>$url,'class'=>'col s12'));?>
	<div class="row">
	  <div class="input-field col s3">
		<?php echo $this->Form->select('anhiolectivo',array('2019'=>'2019','2018'=>'2018'),array('empty'=>'Seleccione...'));?>
	    <label for="BuscarAnhiolectivo"><?php echo __('Año Lectivo'); ?></label> 
	  </div>
	  <div class="input-field col s3">
		<?php echo $this->Form->select('buscador',$elementos,array('empty'=>'Seleccione...'));?>
	    <label for="BuscarBuscador"><?php echo __('Opciones'); ?></label> 
	  </div>
	  <div class="input-field col s3">
		<?php echo $this->Form->text('valor');?>
	    <label for="BuscarValor"><?php echo __('Buscar'); ?></label> 
	  </div>
	  <div class="input-field col s3">
		<?php echo $this->Form->submit(__('Search'),array('class'=>'waves-effect waves-light btn','div'=>false));?>
	  </div>
	</div>
	<?php echo $this->Form->end();?>
</div>
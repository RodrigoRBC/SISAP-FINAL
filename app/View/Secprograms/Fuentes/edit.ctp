<?php
echo $this->Html->script('jquery.min.js');
echo $this->Html->script('select2/select2.min.js');
echo $this->Html->css('select2/select2.min.css');?>
<script type="text/javascript">
	$(document).ready(function($) {
	  $(".js-example-basic").select2({
		  placeholder: "Seleccione..",
		  allowClear: true
		});
	});
</script>
<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('Editar Fuente SGC (Modelo AUDIT)');?></h4>
	<div class="row">
<?php echo $this->Form->create('Fuente',array('class'=>'col s12'));?>
		<?php echo $this->Form->input('id', array('type'=>'hidden')); ?>
	<div class="row">

		<div class="input-field col s12" >
		    <?php echo $this->Form->input('descripcion',array('type'=>'textarea','class'=>'materialize-textarea')); ?>
		</div>
		
		<div class="field" >
		    <label>Procedimiento</label>
		    <?php echo $this->Form->input('procedimiento_id',array('label'=>false,'class'=>'js-example-basic','style'=>'width:100%;')); ?>
		</div>
		
		<div class="field" >
		    <label>Evidencia</label>
		    <?php echo $this->Form->input('evidencia_id',array('label'=>false,'class'=>'js-example-basic','style'=>'width:100%;')); ?>
		</div>

		<div class="input-field col s12" >
				<?php 
					$options=array('AC'=>__('Enable',true),'DE'=>__('Disable',true));		
					echo $this->Form->radio('status',$options,array('legend'=>'','default'=>'AC'));
				?>
		</div>	

		<div class="input-field center col s12">
			<?php echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn pink'));	?>		
			<?php  echo $this->Html->link(__('cerrar'),'index',array('class'=>'waves-effect waves-light btn pink')); ?>
		</div>

	</div>	
	<?php echo $this->Form->end(); ?>
	</div>
	</div>
</div>
</div>

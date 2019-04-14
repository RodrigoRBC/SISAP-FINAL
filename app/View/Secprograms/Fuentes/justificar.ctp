<?php 
echo $this->Html->script('jquery.min.js');
echo $this->Html->script('dropify/dropify.min.js');
echo $this->Html->script('jquery-ui/jquery-ui.js');
echo $this->Html->script('jquery.range.js');

echo $this->Html->css('jquery.range.css');
echo $this->Html->css('dropify/dropify.min.css');
echo $this->Html->css('jquery-ui/jquery-ui.css');

echo $this->Html->script('select2/select2.min.js');
echo $this->Html->css('select2/select2.min.css');?>
<script type="text/javascript">
	$(document).ready(function($) {
	  $(".js-example-basic").select2({
		  placeholder: "Seleccione..",
		  allowClear: true
		});
	  $('.dropify').dropify();
	  
	  $('#FdesagregadaAvance').jRange({
	  	from:0.0,
	  	to:100.0,
	  	step:1.0,
	  	format:'%s',
	  	width:480,
	  	showLabels:true,
	  	snap:true});  

	});
</script>
<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('Justificar Fuente SGC (Modelo AUDIT)');?></h4>
	<div class="row">
	<?php echo $this->Form->create('Fuente',array('type'=>'file','class'=>'col s12')); ?>
		<?php echo $this->Form->input('id', array('type'=>'hidden')); ?>
	<div class="row">

	<?php 
		if(!empty($fuente['Fuente']['filename_dir'])){
	?>
	<div class="input-field center col s12">
		<a class="waves-effect waves-light btn green" href='<?php echo $this->Html->url("../files/fuente/filename/".$fuente['Fuente']['filename_dir']."/".$fuente['Fuente']['filename']);?>' target="_blank">DESCARGAR HERRAMIENTA</a>
	</div>	
	<?php
		}else{
	?>
	<div class="input-field center col s12">
		<a class="waves-effect waves-light btn green" href='#'>DESCARGAR HERRAMIENTA</a>
	</div>	
	<?php
		}
	?>		

	<?php 
		$file = array();
		if(!empty($fuente['Fuente']['filename_dir'])){
		$file = array('data-default-file'=>$this->Html->url("../files/fuente/filename/".$fuente['Fuente']['filename_dir']."/".$fuente['Fuente']['filename']));
		}
	?>
	<div class="input-field col s12">
		<div class="row">
		<?php echo $this->Form->input('filename', array('type'=>'file','label' => false,'class'=>'dropify')+$file); 
			echo $this->Form->input('filename_dir',array('type'=>'hidden'));?>		
		</div>
	</div>


	  <div class="col s12">
	  	<p>
	    	<?php echo $this->Form->checkbox('acreditacion',array('class'=>'filled-in'));?>	
	     	<label for="FuenteAcreditacion"><?php echo __('Acreditación'); ?></label>
	  	<p>
	  </div>
		
		
		<div class="field" >
		    <label>Estandar</label>
		    <?php echo $this->Form->input('estandare_id',array('label'=>false,'class'=>'js-example-basic','style'=>'width:100%;')); ?>
		</div>


	  <div class="col s12">
	  	<p>
	    	<?php echo $this->Form->checkbox('licenciamiento',array('class'=>'filled-in'));?>	
	     	<label for="FuenteLicenciamiento"><?php echo __('Licenciamiento'); ?></label>
	  	<p>
	  </div>


		<div class="field" >
		    <label>Condición</label>
		    <?php echo $this->Form->input('condicione_id',array('type'=>'select','label'=>false,'class'=>'js-example-basic','style'=>'width:100%;')); ?>
		</div>
		

		<div class="field" >
		    <label>Procedimiento</label>
		    <?php echo $this->Form->input('procedimiento_id',array('label'=>false,'class'=>'js-example-basic','style'=>'width:100%;','disabled'=>'disabled')); ?>
		</div>

		<div class="field" >
		    <label>Evidencia</label>
		    <?php echo $this->Form->input('evidencia_id',array('label'=>false,'class'=>'js-example-basic','style'=>'width:100%;','disabled'=>'disabled')); ?>
		</div>

		<div class="input-range col s12" >
			<div class="input-field col s3" >
	    		<h6><?php echo __('Avance').'*'; ?></h6>
	    	</div>
			<div class="input-field col s3" >
		    <?php echo $this->Form->input('avance',array('label'=>false,'type'=>'range','min'=>0,'max'=>100,'required'=>'required','value'=>$fuente['Fuente']['avance'])); ?>
	    	</div>
		</div>

		<div class="input-field col s12" >
				<?php 
					$options=array('AC'=>__('Enable',true),'DE'=>__('Disable',true));		
					echo $this->Form->radio('status',$options,array('legend'=>'','default'=>'AC'));
				?>
		</div>	

		<div class="input-field center col s12">
			<?php echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn pink'));	?>		
			<?php  echo $this->Html->link(__('cerrar'),'indexeval',array('class'=>'waves-effect waves-light btn pink')); ?>
		</div>

	</div>	
	<?php echo $this->Form->end(); ?>
	</div>
	</div>
</div>
</div>

<?php 
echo $this->Html->script('plugins/jquery.min.js');
	  //echo $this->Html->script('general/tqc.js',array('inline'=>false));
 	  //echo $this->Html->script('js-fecha/fecha_inicializacion.js');
	  //echo $this->Html->script('js-fecha/jquery-ui-1.7.2.custom.min.js');
	  //echo $this->Html->script('js-fecha/ui/i18n/ui.datepicker-es.js');
	  //echo $this->Html->script('secpeople/modificarpasswordusuario.js',array('inline'=>false));  
	  //$css = array('theme/redmond/jquery-ui-1.7.2.custom', 'theme/demo');
	  //echo $this->Html->css($css, 'stylesheet', array('media'=>array('', '')));
?>

   <script type="text/javascript">
	$(document).ready(function() {
		//$('#SecpersonNuevacontrasenia')
	  	$('#btn').on('click', function() {
	  		if($('#SecpersonNuevacontrasenia').attr('type')=="password")
				$('#SecpersonNuevacontrasenia').attr('type',"text");
	  		if($('#SecpersonNuevacontrasenia').attr('type')=="text")
				$('#SecpersonNuevacontrasenia').attr('type',"password");
	  		if($('#SecpersonConfirmarcontrasenia').attr('type')=="password")
				$('#SecpersonConfirmarcontrasenia').attr('type',"text");
	  		if($('#SecpersonConfirmarcontrasenia').attr('type')=="text")
				$('#SecpersonConfirmarcontrasenia').attr('type',"password");
		});
	});
	</script>
<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('Modificar Password');?></h4>
	<div class="row">

	<div class="ui blue inverted segment" ><?php echo __('usuario:',true).' '.$usuario;?>
	</div>

	<br/>
	<hr/>	

<?php 
echo $this->Form->create('Secperson',array('class'=>'col s12'));
	  echo $this->Form->hidden('id');
?>
	<div class="row">
		<div class="input-field col s12" >

		<div class="input-field col s12" >
			<i class="mdi-image-remove-red-eye prefix" id="btn"></i>	
		    <?php echo $this->Form->text('nuevacontrasenia',array('label'=>false,'type'=>'password')); ?>
	     	<label for="SecpersonNuevacontrasenia"><?php echo __('nuevacontrasenia'); ?></label>
		</div>

		<div class="input-field col s12" >
			<i class="mdi-image-remove-red-eye prefix" id="btn"></i>
		    <?php echo $this->Form->text('confirmarcontrasenia',array('label'=>false,'type'=>'password')); ?>
	     	<label for="SecpersonConfirmarContrasenia"><?php echo __('Confirmar Contraseña'); ?></label>
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
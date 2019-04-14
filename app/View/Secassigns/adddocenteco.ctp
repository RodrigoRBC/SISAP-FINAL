<?php
echo $this->Html->script('plugins/jquery.min.js');
echo $this->Html->script('select2/select2.min.js');
echo $this->Html->css('select2/select2.min.css');
echo $this->Html->css('select2-materialize.css');?>
<script type="text/javascript">
	var escuelas=<?php echo json_encode($secprojects);?>; 
    var roles=<?php echo json_encode($secroles);?>; 
</script>
<script type="text/javascript">		
$(document).ready(function() {
	//$('select').material_select();

	$(".js-example-basic").select2({
		  placeholder: "Seleccione..",
		  allowClear: true
	});
  	$('#SecassignSecorganizationId').change(function(){
			var valor = $("#SecassignSecorganizationId option:selected").text();
			var value = $("#SecassignSecorganizationId").val();
			
			$("#SecassignSecprojectId").prop('disabled', false);
			$('#SecassignSecprojectId').children().remove();
			$('#SecassignSecprojectId').append($('<option>', {value:'0', text:'Seleccione'}));
			$('#SecassignSecprojectId').select2('val', '0');

			$('#SecassignSecroleId').children().remove();
			$("#SecassignSecroleId").prop('disabled', false);
			$('#SecassignSecroleId').append($('<option>', {value:'0', text:'Seleccione'}));	
			$('#SecassignSecroleId').select2('val', '0');
			for (var i = 0; i < escuelas.length; i++) {
				if(value == escuelas[i]['Secproject']['secorganization_id']){
					$('#SecassignSecprojectId').append($('<option>', {value:escuelas[i]['Secproject']['id'], text:escuelas[i]['Secproject']['name']}));							
				}	
			}
			for (var i = 0; i < roles.length; i++) {
				if(value == roles[i]['Secrole']['secorganization_id']){	
					$('#SecassignSecroleId').append($('<option>', {value:roles[i]['Secrole']['id'], text:roles[i]['Secrole']['name']}));								
				}	
			}
		if(value == null || value==''){
			console.log(true);
			$('#SecassignSecprojectId').children().remove();
			$('#SecassignSecprojectId').select2('val', '0');
			$("#SecassignSecprojectId").prop('disabled', true);

			$('#SecassignSecroleId').children().remove();
			$('#SecassignSecroleId').select2('val', '0');
			$("#SecassignSecroleId").prop('disabled', true);
		}
	});	
});
</script>
<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('personaAgregar');?></h4>
	<div class="row">

	<?php echo $this->Form->create('Secassign',array('class'=>'col s12'));?>
	<div class="row">
		<div class="input-field col s12" >
			<?php echo $this->Form->text('firstname');
					echo $this->Form->error('firstname', array(															
													   	'notEmpty' =>  __('personaNombreNoVacio', true),
														'maxLength' =>  __('personaNombreLongitud', true),											      
														), array('class' => 'input text required error'));
				?>	
	     	<label for="SecpersonFirstname"><?php echo __('name').'*'; ?></label>
		</div>
		
		<div class="input-field col s12" >
				<?php echo $this->Form->text('appaterno'); 
				 	  echo $this->Form->error('appaterno', array(															
													   	'notEmpty' =>  __('personaAppaternoNoVacio', true),
														'maxLength' =>  __('personaAppaternoLongitud', true),											      
														), array('class' => 'input text required error'));
				?>
	     	<label for="SecpersonAppaterno"><?php echo __('apellidoPaterno').'*'; ?></label>
		</div>
				
		<div class="input-field col s12" >
				<?php echo $this->Form->text('apmaterno'); 
					  echo $this->Form->error('apmaterno', array(															
													   	'notEmpty' =>  __('personaApmaternoNoVacio', true),
														'maxLength' =>  __('personaApmaternoLongitud', true),											      
														), array('class' => 'input text required error'));
				?>
	     	<label for="SecpersonApmaterno"><?php echo __('apellidoMaterno').'*'; ?></label>
		</div>


		
		<div class="input-field col s12" >
			<div class="col s3" >
				<h6>Facultad*</h6>
			</div>
			<div class="input-field col s9" >	
				<?php echo $this->Form->input('secorganization_id',array('label' => false,'empty'=>'seleccione','class'=>'js-example-basic'));				
				?>
			</div>
		</div>

		<div class="input-field col s12" >
			<div class="input-field col s3" >
				<h6>Escuelas*</h6>
			</div>
			<div class="input-field col s9" >
	  			<select name="data[Secassign][secproject_id]" id='SecassignSecprojectId' class='js-example-basic'>
	  			</select>
			</div>
		</div>

		<div class="input-field col s12" >
			<div class="input-field col s3" >
				<h6>Roles*</h6>
			</div>
			<div class="input-field col s9" >
	  		<select name="data[Secassign][secrole_id]" id='SecassignSecroleId' label = 'Rol' class='js-example-basic'>
	  		</select>
			</div>
		</div>	
		<hr/>
		
		<div class="input-field center col s12">
			<?php echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn'));	?>			
			<?php  echo $this->Form->button(__('cerrar'),array('onClick' => 'javascript:window.close()','class'=>'waves-effect waves-light btn pink')); ?>
		</div>

	</div>	
	<?php echo $this->Form->end(); ?>
	</div>
	</div>
</div>
</div>
<?php echo $this->element('actualizar'); ?>
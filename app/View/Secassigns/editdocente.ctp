	<?php
echo $this->Html->script('plugins/jquery.min.js');
echo $this->Html->script('select2/select2.min.js');
echo $this->Html->css('select2/select2.min.css');
echo $this->Html->css('select2-materialize.css');?>
<script type="text/javascript">
	var arrayEscuelas=<?php echo json_encode($secprojects);?>; 
    var arrayRoles=<?php echo json_encode($secroles);?>; 
    var asignacion=<?php echo json_encode($secassign);?>; 
</script>
<script type="text/javascript">		
$(document).ready(function() {
	  $('#SecassignSecorganizationId').val(asignacion['Secrole']['secorganization_id']);
		$("#SecassignSecprojectId").prop('disabled', false);
		$('#SecassignSecprojectId').children().remove();
		for (var i = 0; i < arrayEscuelas.length; i++) {
			if(asignacion['Secrole']['secorganization_id'] == arrayEscuelas[i]['Secproject']['secorganization_id'])
				$('#SecassignSecprojectId').append($('<option>', {value:arrayEscuelas[i]['Secproject']['id'], text:arrayEscuelas[i]['Secproject']['name']}));				
		}

	  $('#escuelavalue').val(asignacion['Secassign']['secproject_id']);
		$("#SecassignSecroleId").prop('disabled', false);
		$('#SecassignSecroleId').children().remove();
		for (var i = 0; i < arrayRoles.length; i++) {
			if(asignacion['Secrole']['secorganization_id'] == arrayRoles[i]['Secrole']['secorganization_id'])
				$('#SecassignSecroleId').append($('<option>', {value:arrayRoles[i]['Secrole']['id'], text:arrayRoles[i]['Secrole']['name']}));				
		}
	  $('#SecassignSecroleId').val(asignacion['Secrole']['id']);

	$(".js-example-basic").select2({
		  placeholder: "Seleccione..",
		  allowClear: true
	});
  	$('#SecassignSecorganizationId').change(function(){
			var valor = $("#SecassignSecorganizationId option:selected").text();
			var value = $("#SecassignSecorganizationId").val();
			$('#SecassignSecprojectId').children().remove();
			$('#SecassignSecprojectId').append($('<option>', {value:'', text:'Seleccione'}));
			$('#SecassignSecroleId').children().remove();
			$('#SecassignSecroleId').append($('<option>', {value:'', text:'Seleccione'}));	
			for (var i = 0; i < arrayEscuelas.length; i++) {
				if(value == arrayEscuelas[i]['Secproject']['secorganization_id']){
					$('#SecassignSecprojectId').append($('<option>', {value:arrayEscuelas[i]['Secproject']['id'], text:arrayEscuelas[i]['Secproject']['name']}));							
				}	
			}
			for (var i = 0; i < roles.length; i++) {
				if(value == arrayRoles[i]['Secrole']['secorganization_id']){	
					$('#SecassignSecroleId').append($('<option>', {value:arrayRoles[i]['Secrole']['id'], text:arrayRoles[i]['Secrole']['name']}));								
				}	
			}
	});	
});
</script>
<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">
	<div class="card-panel">
		<h4 class="header2"><?php echo __('asignacionModificar');?></h4>
	<div class="row">
	<?php echo $this->Form->create('Secassign',array('class'=>'col s12'));?>
	<?php echo $this->Form->input('id', array('type'=>'hidden')); ?>
	<div class="row">	
		
		<div class="input-field col s12" >
			<div class="input-field col s3" >
				<h6>Usuario*</h6>
			</div>
			<div class="input-field col s9" >	
				<?php echo $this->Form->input('secperson_id',array('label' => false,'empty'=>'seleccione','class'=>'js-example-basic')); ?>	
			</div>
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
		
		
		<div class="input-field col s12" >
			<div class="input-field col s3" >
				<h6>Estado</h6>
			</div>
			<div class="input-field col s9" >
				<?php 
					$options=array('AC'=>__('Enable',true),'DE'=>__('Disable',true));		
					echo $this->Form->radio('status',$options,array('legend'=>'','default'=>'AC'));
				?>
			</div>
		</div>	
		
		<br/>	


		<div class="input-field center col s12">
			<?php echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn'));	?>		
			<?php  echo $this->Html->link(__('cerrar'),'indexdocentes',array('class'=>'waves-effect waves-light btn')); ?>
		</div>


	</div>	
	<?php echo $this->Form->end(); ?>
	</div>
	</div>
</div>
</div>
<?php echo $this->Js->writeBuffer(); ?>
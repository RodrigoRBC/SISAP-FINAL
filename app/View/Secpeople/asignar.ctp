<?php
echo $this->Html->script('jquery.min.js');
echo $this->Html->script('select2/select2.min.js');
echo $this->Html->css('select2/select2.min.css');?>
   <script type="text/javascript">
	   var rowCount = 0; 
	   //var arrayDesagregadas=<?php //echo json_encode($fdesagregadas);?>;
	   var arrayEscuelas=<?php echo json_encode($secprojects);?>;
	   var tecnico=<?php echo json_encode($secperson);?>;

	   /*function addDesagregada(frm) { 
	   	rowCount ++; 
	   	if($("#desagregadavalue").val().length < 1) {  
        	alert("Debe seleccionar un Producto/Evidencia");  
        	return false;      	
        }else{
		var valor = $("#desagregadavalue option:selected").text();
		var value = $("#desagregadavalue").val();
	   		var recRow = '<tr><td><p id="rowCount'+rowCount+'"><input type="hidden" name="data[Historialreporte]['+rowCount+'][fdesecproject_id]" value="'+value+'" id="value0'+rowCount+'">'+valor+'</td><td> <a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Eliminar</a></p></td></tr>'; 
	   		for (var i = 0; i < arrayDesagregadas.length; i++) {
	   			if(value == arrayDesagregadas[i]['Fdesecproject']['id']){
	   				if(exist(arrayDesagregadas[i]['Fdesecproject']['id'])){  
        				alert("Esta Producto/Evidencia ya fue asignado.");  
        				//return false;  
	   				}else{
	   					$("#value0").append(recRow);  
					   	}
					}
				}
			}
	   } 

	   function exist(id) { 
	   for (var i = 0; i < 15; i++) {
	   			var val	= $('#value0'+i).val();
	   			if(val == id){ 
	   				return true;
	   			}
	   		}
	   	return  false;
	   }

	   function removeRow(removeNum) {  
        //var valor = $('#total'+removeNum).val();
	   	jQuery('#rowCount'+removeNum).parent().parent().remove(); 
	   	rowCount --;
	   }*/
	</script>
   <script type="text/javascript">
	$(document).ready(function($) {
		for (var i = 0; i < arrayEscuelas.length; i++) {
			for (var j = 0; j < tecnico['Secassign'].length; j++) {
				if(tecnico['Secassign'][j]['secproject_id'] == arrayEscuelas[i]['Secproject']['id'])
					$('#escuelavalue').append($('<option>', {value:arrayEscuelas[i]['Secproject']['id'], text:arrayEscuelas[i]['Secproject']['name']}));	
			}	
		}

	  $(".js-example-basic-escuela").select2({
		  placeholder: "Seleccione una Escuela Profesional",
		  allowClear: true
		});

	  $(".js-example-basic").select2({
		  placeholder: "Seleccione..",
		  allowClear: true
		});
	});
	</script>
<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('Asignar Productos/Evidencias a Tecnico');?></h4>
	<div class="row">
	
	<?php echo $this->Form->create('Secperson',array('class'=>'col s12'));?>
		<?php echo $this->Form->input('id', array('type'=>'hidden')); ?>
	<div class="row">

	<div class="input-field col s12" >
		<?php echo h($secperson['Secperson']['firstname'].' '.$secperson['Secperson']['appaterno'].' '.$secperson['Secperson']['apmaterno']); ?>
	</div>

	<div class="field col s12" >
		<label>
	      <?php echo __('Escuela Profesionales'); ?>
	    </label>
	  	<select name="data[Secperson][secproject_id]" id='escuelavalue' class='js-example-basic-escuela' style='width:100%;' required="required">
	  		<option></option>
	  	</select>
	</div>

	<!--<div class="field col s12" >
		<label>
	      <?php //echo __('Cmc'); ?>
	    </label>
	  	<?php //echo $this->Form->input('cmc_id',array('class'=>'js-example-basic','label'=>false,'required'=>'required','style'=>'width:100%;'));?>
	</div>-->

		
		<div class="input-field center col s12">
			<?php echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn pink'));	?>		
			<?php  echo $this->Html->link(__('cerrar'),array('controller'=>'secassigns','action'=>'indextecnicos'),array('class'=>'waves-effect waves-light btn pink')); ?>
		</div>

	</div>	
	<?php echo $this->Form->end(); ?>
	</div>
	</div>
</div>
</div>

<?php
	echo $this->Html->script('plugins/jquery.min.js');
	echo $this->Html->script('materialize.min.js');
//	echo $this->Html->css('validate/screen.css');
?>
<?php $this->Session->flash();?>
<div class="row">
	<div class="col s12 m12 112">
		<div class="card-panel">
			<h4 class="header2"><?php echo __('AGREGAR PAGOS');?></h4>
			<div class="row">
				<?php echo $this->Form->create('ArbpeopleArbrate',array('class'=>'col s12')); ?>
				<div class="row">
					<div class="input-field col s6">
						<!-- {Input-Type} -->
						<?php echo $this->Form->input('dni', array('type' => 'number', 'label' => false, 'div' => false));?>
						<!-- {Input-Error} -->
						<?php echo $this->Form->error('dni', array(
																'notEmpty' =>  __('personaNombreNoVacio', true),
															'maxLength' =>  __('personaNombreLongitud', true),
															), array('class' => 'input text required error'));?>
						<!-- {Input-Label} -->
							<label for="ArbpeopleArbrateDni"><?php echo __('N.° D.N.I').'*'; ?></label>
					</div>
					<div class="input-field col s6">
						<?php echo $this->Form->button(__('Buscar'), array('type'=>'button', 'id'=>'ArbpeopleArbrateBuscar','div'=>false,'class'=>'waves-effect waves-light btn'));	?>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<!-- {Input-Type} -->
						<?php
							echo $this->Form->input('arbperson_id',array('type'=>'hidden'));
							echo $this->Form->text('beneficiario');
						?>
						<!-- {Input-Label} -->
							<label for="ArbpeopleArbrateArbpersonId"><?php echo __('Beneficiario').'*'; ?></label>
						<!-- {Input-Error} -->
						<?php echo $this->Form->error('arbperson_id', array(
																'notEmpty' =>  __('personaNombreNoVacio', true),
															'maxLength' =>  __('personaNombreLongitud', true),
															), array('class' => 'input text required error'));?>
						<!-- {Input-Label} -->
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<?php echo $this->Form->select('arbrate_id', $arbrates, array(
											'empty'=>'Seleccione...'
										)); ?>
						<label for="ArbpeopleArbrateArbrateId"><?php echo __('Tasa').'*'; ?></label>
						<?php		  echo $this->Form->error('arbrate_id', array(
																	    'numeric' =>  __('empresaTypeNumero', true),
																		'notEmpty' =>  __('empresaTypeNoVacio', true)
																		), array('class' => 'input text required error'));
								?>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<!-- {Input-Type} -->
						<?php
							echo $this->Form->input('arbitration_rate');
						?>
						<!-- {Input-Label} -->
							<label for="ArbpeopleArbrateArbitrationRate"><?php echo __('Monto').'*'; ?></label>
						<!-- {Input-Error} -->
						<?php echo $this->Form->error('arbitration_rate', array(
																'notEmpty' =>  __('personaNombreNoVacio', true),
															'maxLength' =>  __('personaNombreLongitud', true),
															), array('class' => 'input text required error'));?>
						<!-- {Input-Label} -->
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<!-- {Input-Type} -->
						<?php echo $this->Form->input('payment_date');?>
						<!-- {Input-Error} -->
						<?php echo $this->Form->error('payment_date', array(
																'notEmpty' =>  __('personaNombreNoVacio', true),
															'maxLength' =>  __('personaNombreLongitud', true),
															), array('class' => 'input text required error'));?>
						<!-- {Input-Label} -->
							<label for="ArbpeopleArbratePaymentDate"><?php echo __('Fecha de Pago').'*'; ?></label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<!-- {Input-Type} -->
						<?php echo $this->Form->input('document');?>
						<!-- {Input-Error} -->
						<?php echo $this->Form->error('document', array(
																'notEmpty' =>  __('personaNombreNoVacio', true),
															'maxLength' =>  __('personaNombreLongitud', true),
															), array('class' => 'input text required error'));?>
						<!-- {Input-Label} -->
							<label for="ArbpeopleArbrateDocument"><?php echo __('Documento').'*'; ?></label>
					</div>
				</div>

				<div class="row">
					<!-- {Input-Botton} -->
					<div class="input-field center col s12">
						<?php echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn'));	?>
						<?php  echo $this->Html->link(__('cerrar'),'index',array('class'=>'waves-effect waves-light btn')); ?>
					</div>
				<!-- {End-Field} -->
				</div>
			<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" >
	$(document).ready(function(){
		$("#ArbpeopleArbrateBuscar").click(function(){
			$dni = $('#ArbpeopleArbrateDni').val();
			$.ajax({
				// la URL para la petición
				url : 'json_search',
				// la información a enviar
				data : {'data[ArbpeopleArbrate][dni]' : $dni },
				// especifica si será una petición POST o GET
				type : 'POST',
				// el tipo de información que se espera de respuesta
				dataType : 'json',
				// código a ejecutar si la petición es satisfactoria;
				success : function(json) {
					$("#ArbpeopleArbrateArbpersonId").val(json.data.id);
					$("#ArbpeopleArbrateBeneficiario").val(json.data.name);
				},
				// código a ejecutar si la petición falla
				error : function(xhr, status) {
						alert('Disculpe, existió un problema');
				},
				// código a ejecutar sin importar si la petición falló o no
				complete : function(xhr, status) {
						//alert('Petición realizada');
				}
			});
		});

		$("#ArbpeopleArbrateArbrateId").change(function(){
			$.ajax({
				// la URL para la petición
				url : 'json_rate',
				// la información a enviar
				data : $('#ArbpeopleArbrateArbrateId').serialize(),
				// especifica si será una petición POST o GET
				type : 'POST',
				// el tipo de información que se espera de respuesta
				dataType : 'json',
				// código a ejecutar si la petición es satisfactoria;
				success : function(json) {
					$("#ArbpeopleArbrateArbitrationRate").val(json.data.name);
				},
				// código a ejecutar si la petición falla
				error : function(xhr, status) {
						alert('Disculpe, existió un problema');
				},
				// código a ejecutar sin importar si la petición falló o no
				complete : function(xhr, status) {
						//alert('Petición realizada');
				}
			});
		});

	});
</script>

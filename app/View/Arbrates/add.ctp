<?php
	echo $this->Html->script('plugins/jquery.min.js');
	echo $this->Html->script('materialize.min.js');
//	echo $this->Html->css('validate/screen.css');
?>
<?php $this->Session->flash();?>
<div class="row">
	<div class="col s12 m12 112">
		<div class="card-panel">
			<h4 class="header2"><?php echo __('AGREGAR TASA');?></h4>
			<div class="row">
				<?php echo $this->Form->create('Arbrate',array('method'=>'get','class'=>'col s12')); ?>
					<div class="row">
						<div class="input-field col s12">
							<!-- {Input-Type} -->
							<?php
								echo $this->Form->input('total_cost', array('type' => 'number', 'label' => false, 'div' => false));
							?>
							<!-- {Input-Type} -->

							<!-- {Input-Label} -->
								<label for="ArbrateTotal_cost"><?php echo __('Costo Total').'*'; ?></label>
							<!-- {Input-Label} -->

							<!-- {Input-Error} -->
							<?php echo $this->Form->error('total_cost', array(
															   	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-error} -->
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<!-- {Input-Type} -->
							<?php echo $this->Form->input('number_of_inhabitants', array('type' => 'number', 'label' => false, 'div' => false));?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('number_of_inhabitants', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbrateNumber_of_inhabitants"><?php echo __('N.° de Habitantes').'*'; ?></label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<!-- {Input-Type} -->
							<?php echo $this->Form->text('year_and_month', array());?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('year_and_month', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbrateYear_and_month"><?php echo __('Año y Mes').'*'; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<!-- {Input-Type} -->
							<?php echo $this->Form->input('monthly_rate', array('type' => 'number', 'label' => false, 'div' => false, 'readonly' => 'readonly'));?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('monthly_rate', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbrateMonthly_rate"><?php echo __('Tasa Mensual').'*'; ?></label>
						</div>
						<div class="input-field col s6">
							<?php echo $this->Form->button(__('Calcular'), array('type'=>'button', 'id'=>'ArbrateCalcular','div'=>false,'class'=>'waves-effect waves-light btn'));	?>
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
<script>
$().ready(function() {
	$.validator.setDefaults({

	});

	// validate signup form on keyup and submit
	$("#ArbrateAddForm").validate({
		rules: {
			'data[Arbrate][total_cost]': {
				required: true,
				number: true
			},
			'data[Arbrate][number_of_inhabitants]': {
				required: true,
				number: true
			},
			'data[Arbrate][year_and_month]': {
				required: true,
				number: true,
				minlength: 6
			}
		},
		messages: {
			'data[Arbrate][total_cost]': {
				required: "Ingrese un numero",
				number: "Por favor ingrese un numero valido"
			},
			'data[Arbrate][number_of_inhabitants]': {
				required: "Ingrese un numero",
				number: "Por favor ingrese un numero valido"
			},
			'data[Arbrate][year_and_month]': {
				required: "Please enter a username",
				number: "Ingrese de la siguiente manera 201901",
				minlength: "Minimo debe contener 6 caracteres"
			}
		}
	});

	$("#ArbrateCalcular").click(function(){
		var ArbrateTotalCost = parseFloat($("#ArbrateTotalCost").val());
		var ArbrateNumberOfInhabitants = parseFloat($("#ArbrateNumberOfInhabitants").val());
		var ArbrateMonthlyRate = parseFloat((ArbrateTotalCost)/(ArbrateNumberOfInhabitants*12)).toFixed(2);
		$("#ArbrateMonthlyRate").val(ArbrateMonthlyRate);
	});



});
</script>

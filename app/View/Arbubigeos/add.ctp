<?php
	echo $this->Html->script('plugins/jquery.min.js');
	echo $this->Html->script('materialize.min.js');
?>
<?php $this->Session->flash();?>
<div class="row">
	<div class="col s12 m12 112">
		<div class="card-panel">
			<h4 class="header2"><?php echo __('AGREGAR UBIGEO');?></h4>
			<div class="row">
				<!-- {Start-Form} -->
				<?php echo $this->Form->create('Arbubigeo',array('class'=>'col s12')); ?>

				<div class="row">
					<!-- {Start-Field} -->
						<!-- ***init-1***   -->
						<div class="input-field col s12" >
							<!-- {Input-Type} -->
							<?php
								echo $this->Form->text('code', array());
							?>
							<!-- {Input-Label} -->
								<label for="ArbubigeoCode"><?php echo __('Código').'*'; ?></label>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('code', array(
															   	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
						</div>
						<!-- ***Off-1***   -->

						<!-- ***init-2***   -->
						<div class="input-field col s12" >
							<!-- {Input-Type} -->

							<?php echo $this->Form->text('district', array());?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('district', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbubigeoDistrict"><?php echo __('Distrito').'*'; ?></label>
						</div>
						<!-- ***Off-2***   -->

						<!-- ***init-3***   -->
						<div class="input-field col s12" >
							<!-- {Input-Type} -->
							<?php echo $this->Form->text('province', array());?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('province', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbubigeoProvince"><?php echo __('Provincia').'*'; ?></label>
						</div>
						<!-- ***Off-3***   -->

						<!-- ***init-4***   -->
						<div class="input-field col s12" >
							<!-- {Input-Type} -->
							<?php echo $this->Form->text('department', array());?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('department', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbubigeoDepartment"><?php echo __('Departamento').'*'; ?></label>
						</div>
						<!-- ***Off-4***   -->

						<!-- {Input-Botton} -->
						<div class="input-field center col s12">
							<?php echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn'));	?>
							<?php  echo $this->Html->link(__('cerrar'),'index',array('class'=>'waves-effect waves-light btn')); ?>
						</div>
					<!-- {End-Field} -->
				</div>
				<?php echo $this->Form->end(); ?>
				<!-- {End-Form} -->
			</div>
		</div>
	</div>
</div>

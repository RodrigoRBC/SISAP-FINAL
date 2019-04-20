<?php
	echo $this->Html->script('plugins/jquery.min.js');
	echo $this->Html->script('materialize.min.js');
?>
<?php $this->Session->flash();?>
<div class="row">
	<div class="col s12 m12 112">
		<div class="card-panel">
			<h4 class="header2"><?php echo __('AGREGAR PERSONA');?></h4>
			<div class="row">
				<!-- {Start-Form} -->
				<?php echo $this->Form->create('Arbperson',array('class'=>'col s12')); ?>

				<div class="row">
					<!-- {Start-Field} -->
						<!-- ***init-1***   -->
						<div class="input-field col s12" >
							<!-- {Input-Type} -->
							<?php
								echo $this->Form->input('arbubigeo_id');
							?>
							<!-- {Input-Label} -->
								<label for="ArbpersonArbubigeoId"><?php echo __('Ubigeo').'*'; ?></label>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('arbubigeo_id', array(
															   	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
						</div>
						<!-- ***Off-1***   -->

						<!-- ***init-2***   -->
						<div class="input-field col s12" >
							<!-- {Input-Type} -->

							<?php echo $this->Form->input('dni');?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('dni', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbpersonDni"><?php echo __('N.° D.N.I.').'*'; ?></label>
						</div>
						<!-- ***Off-2***   -->

						<!-- ***init-3***   -->
						<div class="input-field col s12" >
							<!-- {Input-Type} -->
							<?php echo $this->Form->text('names', array());?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('names', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbpersoNames"><?php echo __('Nombres').'*'; ?></label>
						</div>
						<!-- ***Off-3***   -->

						<!-- ***init-4***   -->
						<div class="input-field col s12" >
							<!-- {Input-Type} -->
							<?php echo $this->Form->text('first_surname', array());?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('first_surname', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbpersonFirstSurname"><?php echo __('Apellido Paterno').'*'; ?></label>
						</div>
						<!-- ***Off-4***   -->

						<!-- ***init-4***   -->
						<div class="input-field col s12" >
							<!-- {Input-Type} -->
							<?php echo $this->Form->text('second_surname', array());?>
							<!-- {Input-Error} -->
							<?php echo $this->Form->error('second_surname', array(
																	'notEmpty' =>  __('personaNombreNoVacio', true),
																'maxLength' =>  __('personaNombreLongitud', true),
																), array('class' => 'input text required error'));?>
							<!-- {Input-Label} -->
								<label for="ArbpersonSecondSurname"><?php echo __('Apellido Materno').'*'; ?></label>
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

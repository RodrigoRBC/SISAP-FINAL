
<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('Agregar Docente');?></h4>
	<div class="row">

	<?php echo $this->Form->create('Secperson',array('class'=>'col s12'));?>
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
				<?php $language=array('spa'=>__('castellano',true));
					echo $this->Form->select('language',array($language),array('empty' => 'Seleccione..'),false);  ?>
	     	<label for="SecpersonLanguage"><?php echo __('lenguaje').'*'; ?></label>
		</div>
				
		<div class="input-field col s12" >
				<?php $privelege=array('0'=>__('usuario'),'1'=>__('superUsuario'));
					echo $this->Form->select('privelege',array($privelege),array('empty' => 'Seleccione..'),false); ?>
	     	<label for="SecpersonPrivelege"><?php echo __('privilegio').'*'; ?></label>
		</div>
		
		<div class="input-field col s12" >
			<?php echo $this->Form->text('email', array('type' => 'email'));?>	
	     	<label for="SecpersonEmail"><?php echo __('email'); ?></label>
		</div>	

		<hr/>
		
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
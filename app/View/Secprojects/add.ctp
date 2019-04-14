
<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('ProjectAgregar');?></h4>
	<div class="row">

	<?php echo $this->Form->create('Secproject',array('class'=>'col s12'));?>
	<div class="row">
	  	<div class="input-field col s12">
			<?php echo $this->Form->select('secorganization_id',$secorganizations,array('empty'=>__('seleccionar')));
				echo $this->Form->error('secorganization_id', array(
													       		'notEmpty' =>  __('sucursalOrganizacionNoVacio', true),
																'numeric' =>  __('sucursalOrganizacionNumero', true)	  
																), array('class' => 'input text required error'));
				?>
	    	<label for="SecprojectSecorganizationId"><?php echo __('organizacion').'*'; ?></label>		
		</div>
		
	  	<div class="input-field col s12">
				<?php echo $this->Form->text('code'); 
				 	  echo $this->Form->error('code', array(	
														'notEmpty' =>  __('sucursalCodigoNoVacio', true),
														'codeexist' =>  __('sucursalCodigoUnico', true),
														'maxLength' =>  __('sucursalCodigoLongitud', true),
														'alphaNumeric' =>  __('sucursalCodigoEspacios', true)		      
														), array('class' => 'input text required error'));	
				?>
	    	<label for="SecprojectCode"><?php echo __('codigo').'*'; ?></label>	
		</div>
	  	<div class="input-field col s12">
				<?php echo $this->Form->text('name'); 
				      echo $this->Form->error('name', array(		
													   	'notEmpty' =>  __('sucursalNombreNoVacio', true),
														'descripcionexist' =>  __('sucursalDescripcionUnico', true),
														'maxLength' =>  __('sucursalNombreLongitud', true),	      
														), array('class' => 'input text required error'));
				?>	
	    	<label for="SecprojectName"><?php echo __('nombre').'*'; ?></label>	
		</div>
		
	  	<div class="input-field col s12">
			<?php echo $this->Form->text('photo1'); ?>
	    	<label for="SecprojectPhoto1"><?php echo __('ProjectPhoto1'); ?></label>	
		</div>
		
	  	<div class="input-field col s12">
			<?php echo $this->Form->text('photo2'); ?>
	    	<label for="SecprojectPhoto2"><?php echo __('ProjectPhoto2'); ?></label>	
		</div>
		
	  	<div class="input-field col s12">
			<?php echo $this->Form->text('text1'); ?>
	    	<label for="SecprojectText1"><?php echo __('ProjectText1'); ?></label>	
		</div>
		
	  	<div class="input-field col s12">
			<?php echo $this->Form->text('text2'); ?>
	    	<label for="SecprojectText2"><?php echo __('ProjectText2'); ?></label>	
		</div>
		
	  	<div class="input-field col s12">
			<?php echo $this->Form->text('address'); ?>
	    	<label for="SecprojectAddress"><?php echo __('direccion'); ?></label>	
		</div>
		
	  	<div class="input-field col s12">
			<?php echo $this->Form->text('telefono'); ?>
	    	<label for="SecprojectTelefono"><?php echo __('telefono'); ?></label>	
		</div>
				
		<hr/>		
		
		<div class="input-field center col s12">
			<?php echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn'));	?>				
			<?php  echo $this->Html->link(__('cerrar'),'index', array('class'=>'waves-effect waves-light btn')); ?>
		</div>
	</div>
	<?php echo $this->Form->end();?>
	</div>
	
	</div>
	</div>
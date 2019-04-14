
<?php $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

	<div class="card-panel">
		<h4 class="header2"><?php echo __('empresaAgregar');?></h4>
	<div class="row">

	<?php echo $this->Form->create('Secorganization',array('class'=>'col s12'));?>
	<div class="row">
	  <div class="input-field col s12">
		<?php echo $this->Form->text('code');
				echo $this->Form->error('code', array(													
													   'isUnique' =>  __('empresaCodigoUnico', true),
														'notEmpty' =>  __('empresaCodigoNoVacio', true),
														'maxLength' =>  __('empresaCodigoLongitud', true),
														'alphaNumeric' =>  __('empresaCodigoEspacios', true)							      
														), array('class' => 'input text required error'));		
						
		?>
	    <label for="SecorganizationCode"><?php echo __('codigo').'*'; ?></label> 
	  </div>

	  <div class="input-field col s12">
		<?php echo $this->Form->text('name');  
				echo $this->Form->error('name', array(													
													    'isUnique' =>  __('empresaNombreUnico', true),
														'notEmpty' =>  __('empresaNombreNoVacio', true),
														'maxLength' =>  __('empresaNombreLongitud', true),
													),array('class' => 'input text required error'));
				
				?>
	    <label for="SecorganizationName"><?php echo __('nombre').'*'; ?></label> 
	  </div>
	  
	  <div class="input-field col s12">
		<?php $tipo = array(__('propia', TRUE), __('cliente', TRUE), __('proveedor', TRUE)); ?>
		<?php echo $this->Form->select('type', $tipo, array(
							'empty'=>'Seleccione...'
						));
					  echo $this->Form->error('type', array(															
													    'numeric' =>  __('empresaTypeNumero', true),
														'notEmpty' =>  __('empresaTypeNoVacio', true)
														), array('class' => 'input text required error'));
				?> 
	    <label for="SecorganizationType"><?php echo __('empresaType'); ?></label> 
	  </div>
	  
	  <div class="input-field col s12">
				<?php echo $this->Form->text('thema'); 
				 echo $this->Form->error('thema', array(	
													    'notEmpty' =>  __('empresaThemaNoVacio', true),	
														'maxLength' =>  __('empresaThemaLongitud', true),
														), array('class' => 'input text required error'));
				?>
	    <label for="SecorganizationThema"><?php echo __('empresaThema'); ?></label> 
	  </div>

	  <div class="input-field col s12">
				<?php echo $this->Form->text('photo1');?>
	    <label for="SecorganizationPhoto1"><?php echo __('empresaEncabezado'); ?></label> 
	  </div>

	  <div class="input-field col s12">
				<?php echo $this->Form->text('photo2');?>
	    <label for="SecorganizationPhoto2"><?php echo __('empresaPhoto2'); ?></label> 
	  </div>

	  <div class="input-field col s12">
				<?php echo $this->Form->text('text1');?>
	    <label for="SecorganizationText1"><?php echo __('empresaText1'); ?></label> 
	  </div>

	  <div class="input-field col s12">
				<?php echo $this->Form->text('text2');?>
	    <label for="SecorganizationText2"><?php echo __('empresaText2'); ?></label> 
	  </div>

	  <div class="input-field col s12">
				<?php echo $this->Form->text('address');?>
	    <label for="SecorganizationAddress"><?php echo __('empresaAdress'); ?></label> 
	  </div>

	  <div class="input-field col s12">
				<?php echo $this->Form->text('phono');?>
	    <label for="SecorganizationPhono"><?php echo __('empresaPhone'); ?></label> 
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
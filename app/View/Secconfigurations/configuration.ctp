<?php echo $this->Session->flash();?>

<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('configuracionDePassword',true));?></h4>		

<?php echo $this->Form->create('Secconfiguration',array('action' => 'configuration')); ?>
<?php echo $this->Form->hidden('id') ?>
<table class="striped">
	<thead>
			<tr>
				<th colspan="2" scope="col">
					<?php echo __('configuracion');?>
				</th>
			</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<?php echo __('longitud');?>
			</td>
			<td>
				<?php echo $this->Form->text('minpasswordlength'); 
					  echo $this->Form->error('minpasswordlength', array(															
															        'numeric' =>  __('tipoNumerico'),
															        'minLength' =>  __('campoObligatorio')
																), array('class' => 'input text required error'));
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('tiempoValidades');?>
			</td>
			<td>
				<?php echo $this->Form->text('passwordtimelife'); 
					  echo $this->Form->error('passwordtimelife', array(															
															        'numeric' =>  __('tipoNumerico'),
															        'minLength' =>  __('campoObligatorio')
																), array('class' => 'input text required error'));
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('numeroDeRepeticiones');?>
			</td>
			<td>
				<?php echo $this->Form->text('previouspasswordlimit');
					  echo $this->Form->error('previouspasswordlimit', array(															
															        'numeric' =>  __('tipoNumerico'),
															        'minLength' =>  __('campoObligatorio')
																), array('class' => 'input text required error'));
				 ?>
			</td>
		</tr>
	</tbody>
</table>
		<div class="input-field center col s12">
			<?php echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn'));	?>
		</div>
<?php echo $this->Form->end(); ?>
</div>
</div>
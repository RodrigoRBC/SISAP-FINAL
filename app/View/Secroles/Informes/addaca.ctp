<style type="text/css">
.input-field label {
	top: 0rem;
}
</style>
<div class="row">
<div class="col s12 m12 112">
	<div class="card-panel">
		<h4 class="header2"><?php echo __('Intengrantes del Circulo de Mejora Continua');?></h4>
	<div class="row">
	<?php echo $this->Form->create('Informe',array('class'=>'col s12')); ?>
		<?php echo $this->Form->input('informe_id', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('cmc_id', array('type'=>'hidden')); ?>
	<div class="row">	


	  		<?php foreach ($secpeople as $key => $secperson): ?>
	  		<?php if($cmc['Cmc']['grupo']=='1'){$bool = -1;?>
	  		<?php foreach ($personas as $persona):?>
	  			<?php if($secperson['Secperson']['id']==$persona['Secperson']['id']) $bool = $persona['Secperson']['id'];?>
	  		<?php endforeach;}?>	
	  	<div class="input-field col s12">
			<?php 
				if($cmc['Cmc']['grupo']=='1'){
					$options=array($secperson['Secperson']['id']=>__('SI',true),0=>__('NO',true));	
				echo $this->Form->radio('integrante['.$key.']',$options,array('legend'=>'','required'=>true,'default'=>$bool,'name'=>'data[Informe][integrante]['.$key.']'));	
				}
			?>
	     	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $secperson['Secperson']['firstname'].' '.$secperson['Secperson']['appaterno'].' '.$secperson['Secperson']['apmaterno'];?>
	 	</div>
	  		<?php endforeach;?>
	<div class="input-field center col s12" >
		<?php if($cmc['Cmc']['grupo']=='1') echo $this->Form->submit(__('Submit'), array('div'=>false,'class'=>'waves-effect waves-light btn pink'));	?>	
		<?php echo $this->Html->link('Imprimir Constancia','constanciaaca/'.$cmc_id.'/'.$informe['Informe']['id'],array("target"=>"_blank",'class' => 'waves-effect waves-light btn teal','escape'=>false),null); ?>
	</div>

	</div>	
	<?php echo $this->Form->end(); ?>
	</div>
	</div>
</div>
</div>
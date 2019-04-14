
<?php echo $this->Html->script('jquery.min.js');?>

<?php echo $this->Session->flash();?>

<script type="text/javascript">
	$(document).ready(function() {

		$('#my_frame').load("<?php echo Router::url(array('controller'=>'informes','action'=>'addesp'));?>/"+<?php echo json_encode($cmc_id);?>+"/"+<?php echo json_encode($informe['Informe']['id']);?>);
		$('#my_frame').css('height', '100%');

	});
</script>

<div class="row">
<div class="col s12 m12 112">

<?php if(!empty($observados)):?>
<h4 class="header2" style="color: red;"><?php echo (__('OBSERVADOS DEL PERIODO ANTERIOR',true));?></h4>
<table>
	<thead>
	<tr style="color: red;">
			<th></i><?php echo __('Estandar'); ?></th>
			<th></i><?php echo __('Producto'); ?></th>
			<th><?php echo __('Fecha Límite'); ?></th>
			<th style="text-align: center;"><?php echo __('Avance Docente'); ?></th>
			<th style="text-align: center;"><?php echo __('Avance Evaluador'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
  	<tfoot>
    <tr style="color: red;">
			<!--<th><?php //echo __('Dimensión'); ?></th>-->
			<!--<th><?php //cho __('Factor'); ?></th>-->
			<th><?php echo __('Estandar'); ?></th>
			<th><?php echo __('Producto'); ?></th>
			<th><?php echo __('Fecha Límite'); ?></th>
			<th style="text-align: center;"><?php echo __('Avance Docente'); ?></th>
			<th style="text-align: center;"><?php echo __('Avance Evaluador'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
    </tr>
    
    <tr class="tablesorter-ignoreRow">
    </tr>
  	</tfoot>
	<tbody>
	<?php foreach ($observados as $observado): ?>
	<tr style="color: red;">
		<td><?php echo h($observado['Actividadesespeciale']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($observado['Productosespeciale']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($observado['Historialespreporte']['fechaobservacion']); ?>&nbsp;</td>

		<?php if($observado['Historialespreporte']['avance']<50||empty($observado['Historialespreporte']['avance'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Historialespreporte']['avance']); ?>
		</td>
		<?php endif;?>
		<?php if($observado['Historialespreporte']['avance']>=50&&$observado['Historialespreporte']['avance']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Historialespreporte']['avance']); ?>
		</td>
		<?php endif;?>
		<?php if($observado['Historialespreporte']['avance']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Historialespreporte']['avance']); ?>
		</td>
		<?php endif;?>

		<?php if($observado['Historialespreporte']['avanceevaluador']<50||empty($observado['Historialespreporte']['avanceevaluador'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Historialespreporte']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($observado['Historialespreporte']['avanceevaluador']>=50&&$observado['Historialespreporte']['avanceevaluador']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Historialespreporte']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($observado['Historialespreporte']['avanceevaluador']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Historialespreporte']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<td class="actions">
			<?php echo $this->Html->link(__('JUSTIFICAR'), array('action' => 'justificarpersonal', $observado['Historialespreporte']['id']),array('class'=>'waves-effect waves-light btn pink')); ?>
		</td>	
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
<?php endif;?>

<h4 class="header2"><?php echo (__('HistorialespreporteS A JUSTIFICAR EN CMC ESPECIALES',true));?></h4>
	<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'indexpersonal')); ?>
<table class="striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('Actividadesespeciale.descripcion','ACTIVIDAD'); ?></th>
			<th><?php echo $this->Paginator->sort('Productosespeciale.descripcion','PRODUCTO'); ?></th>
			<th><?php echo $this->Paginator->sort('Historialespreporte.fechainicial','FECHA INICIAL'); ?></th>
			<th><?php echo $this->Paginator->sort('Historialespreporte.fechafin','FECHA FIN'); ?></th>
			<th><?php echo $this->Paginator->sort('Historialespreporte.avance','% AVANCE'); ?></th>
			<th><?php echo $this->Paginator->sort('Historialespreporte.avanceevaluador','% AVANCE EVAL.'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($historialreportes as $historialreporte): ?>
	<tr>
		<?php //if((date("Y-m-d")>=$historialreporte['Historialespreporte']['fechainicial'])&&date("Y-m-d")<=$historialreporte['Historialespreporte']['fechafin']):?>
		<td><?php echo h($historialreporte['Actividadesespeciale']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($historialreporte['Productosespeciale']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($historialreporte['Historialespreporte']['fechainicial']); ?>&nbsp;</td>
		<td><?php echo h($historialreporte['Historialespreporte']['fechafin']); ?>&nbsp;</td>

		<?php if($historialreporte['Historialespreporte']['avance']<50||empty($historialreporte['Historialespreporte']['avance'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Historialespreporte']['avance']); ?>
		</td>
		<?php endif;?>
		<?php if($historialreporte['Historialespreporte']['avance']>=50&&$historialreporte['Historialespreporte']['avance']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Historialespreporte']['avance']); ?>
		</td>
		<?php endif;?>
		<?php if($historialreporte['Historialespreporte']['avance']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Historialespreporte']['avance']); ?>
		</td>
		<?php endif;?>

		<?php if($historialreporte['Historialespreporte']['avanceevaluador']<50||empty($historialreporte['Historialespreporte']['avanceevaluador'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Historialespreporte']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($historialreporte['Historialespreporte']['avanceevaluador']>=50&&$historialreporte['Historialespreporte']['avanceevaluador']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Historialespreporte']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($historialreporte['Historialespreporte']['avanceevaluador']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Historialespreporte']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<td class="actions">
			<?php echo $this->Html->link(__('JUSTIFICAR'), array('action' => 'justificarpersonal', $historialreporte['Historialespreporte']['id']),array('class'=>'waves-effect waves-light btn pink')); ?>
		</td>
	<?php //endif;?>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
<?php echo $this->element('paginador'); ?>
</div>
</div>


<div class="row">
<div class="col s12 m12 112">

	<div class="input-field col s12" >
		<div id="my_frame" style="width: 100%;"></div>
	</div>

</div>
</div>


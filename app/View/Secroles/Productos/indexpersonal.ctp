
<?php echo $this->Html->script('jquery.min.js');?>

<?php echo $this->Session->flash();?>

<script type="text/javascript">
	$(document).ready(function() {

		$('#my_frame').load("<?php echo Router::url(array('controller'=>'informes','action'=>'add'));?>/"+<?php echo json_encode($cmc_id);?>+"/"+<?php echo json_encode($informe['Informe']['id']);?>);
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
		<td>
			<?php echo h($observado['Estandare']['titulo']); ?>
		</td>
		<td>
			<?php echo h($observado['Producto']['descripcion']); ?>
		</td>
		<td>
			<?php echo h($observado['Producto']['fechaobservacion']); ?>
		</td>
		<?php if($observado['Producto']['avance']<50||empty($observado['Producto']['avance'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Producto']['avance']); ?>
		</td>

		<?php endif;?>
		<?php if($observado['Producto']['avance']>=50&&$observado['Producto']['avance']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Producto']['avance']); ?>
		</td>
		<?php endif;?>
		<?php if($observado['Producto']['avance']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Producto']['avance']); ?>
		</td>
		<?php endif;?>

		<?php if($observado['Producto']['avanceevaluador']<50||empty($observado['Producto']['avanceevaluador'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Producto']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($observado['Producto']['avanceevaluador']>=50&&$observado['Producto']['avanceevaluador']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Producto']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($observado['Producto']['avanceevaluador']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($observado['Producto']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<td class="actions">
			<?php echo $this->Html->link(__('JUSTIFICAR'), array('action' => 'justificarpersonal', $observado['Producto']['id']),array('class'=>'waves-effect waves-light btn pink')); ?>
		</td>		
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
<?php endif;?>

<h4 class="header2"><?php echo (__('PRODUCTOS A JUSTIFICAR EN CMC ESTRATÉGICOS',true));?></h4>
<div class="left">
		<?php 
			if(!empty($cmc_id)) echo $this->Html->link(__('VER PLAN DE TRABAJO', true),array('controller'=>'cmcs','action'=>'plancmcestr',$cmc_id),array('div'=>false));
		?>
</div>
	<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'indexpersonal')); ?>
<table class="striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('Estandare.titulo','ESTANDAR'); ?></th>
			<th><?php echo $this->Paginator->sort('Actividade.descripcion','ACTIVIDAD'); ?></th>
			<th><?php echo $this->Paginator->sort('Producto.descripcion','PRODUCTO'); ?></th>
			<th><?php echo $this->Paginator->sort('Producto.fechainicio','FECHA INICIAL'); ?></th>
			<th><?php echo $this->Paginator->sort('Producto.fechafin','FECHA FIN'); ?></th>
			<th><?php echo $this->Paginator->sort('Producto.avance','% AVANCE'); ?></th>
			<th><?php echo $this->Paginator->sort('Producto.avanceevaluador','% AVANCE EVAL.'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($productos as $producto): ?>
	<tr>
		<?php //if((date("Y-m-d")>=$producto['Producto']['fechainicio'])&&date("Y-m-d")<=$producto['Producto']['fechafin']):?>	
		<td><?php echo h($producto['Estandare']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($producto['Actividade']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['fechainicio']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['fechafin']); ?>&nbsp;</td>

		<?php if($producto['Producto']['avance']<50||empty($producto['Producto']['avance'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center;">
			<?php echo h($producto['Producto']['avance']); ?>
		</td>
		<?php endif;?>
		<?php if($producto['Producto']['avance']>=50&&$producto['Producto']['avance']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center;">
			<?php echo h($producto['Producto']['avance']); ?>
		</td>
		<?php endif;?>
		<?php if($producto['Producto']['avance']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center;">
			<?php echo h($producto['Producto']['avance']); ?>
		</td>
		<?php endif;?>

		<?php if($producto['Producto']['avanceevaluador']<50||empty($producto['Producto']['avanceevaluador'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center;">
			<?php echo h($producto['Producto']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($producto['Producto']['avanceevaluador']>=50&&$producto['Producto']['avanceevaluador']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center;">
			<?php echo h($producto['Producto']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($producto['Producto']['avanceevaluador']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center;">
			<?php echo h($producto['Producto']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<td class="actions">
			<?php echo $this->Html->link(__('JUSTIFICAR'), array('action' => 'justificarpersonal', $producto['Producto']['id']),array('class'=>'waves-effect waves-light btn pink')); ?>
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


<?php
echo $this->Html->script('js/jquery-latest.min.js');
echo $this->Html->script('js/jquery.tablesorter.js');
echo $this->Html->script('js/jquery.tablesorter.pager.js');
echo $this->Html->script('js/widget-filter.js');
echo $this->Html->css('css/theme.materialize.css');
echo $this->Html->css('css/jquery.tablesorter.pager.css');?>
<style type="text/css">
ul { padding-left: 20px; }
.btn { font-size: .8em; }
.material-icons { vertical-align: bottom; }
</style>
<script type="text/javascript">
$(function($) {
  /*$("table").tablesorter({
    theme : "materialize",
    widthFixed: true,
    widgets : [ "filter", "zebra" ],
    widgetOptions : {
      zebra : ["even", "odd"],
      filter_reset : ".reset",
      filter_cssFilter: ["", "", "browser-default"]
    }
  })
  .tablesorterPager({
    container: $(".ts-pager"),
    cssGoto  : ".pagenum",
    removeRows: false,
    output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',

  });*/
});
</script>
<?php echo $this->Session->flash();?>

<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('Productos/Evidencias a Justificar (EVALUADOR)',true));?></h4>

	<?php echo $this->Element('buscadorEvaluador', array('elementos'=>$elementos,'secassign_id'=>$secassign['Secassign']['id'],'url' => 'indexevaluador')); ?>

<table>
	<thead>
	<tr>
			<!--<th><?php echo __('Dimensión'); ?></th>
			<th><?php echo __('Factor'); ?></th>-->
			<th style="width: 30%;"><?php echo __('Estandar'); ?></th>
			<th style="width: 35%;"><?php echo __('Producto'); ?></th>
			<th><?php echo __('Unid.Responsable'); ?></th>
			<th style="text-align: center;"><?php echo __('Avance Técnico'); ?></th>
			<th style="text-align: center;"><?php echo __('Avance Evaluador'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
  	<tfoot>
    <tr>
			<!--<th><?php echo __('Dimensión'); ?></th>
			<th><?php echo __('Factor'); ?></th>-->
			<th><?php echo __('Estandar'); ?></th>
			<th><?php echo __('Producto'); ?></th>
			<th><?php echo __('Unid.Responsable'); ?></th>
			<th style="text-align: center;"><?php echo __('Avance Técnico'); ?></th>
			<th style="text-align: center;"><?php echo __('Avance Evaluador'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
    </tr>
    
    <tr class="tablesorter-ignoreRow">
      <!--<th colspan="7" class="ts-pager form-horizontal">
        <button type="button" class="btn first"><i class="mdi-av-skip-previous"></i></button>
        <button type="button" class="btn prev"><i class="mdi-image-navigate-before"></i></button>
        <span class="pagedisplay"></span>
        <!-- this can be any element, including an input -->
        <!--<button type="button" class="btn next"><i class="mdi-image-navigate-next"></i></button>
        <button type="button" class="btn last"><i class="mdi-av-skip-next"></i></button>
        <select class="pagesize browser-default" title="Select page size">
          <option selected="selected" value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="40">40</option>
        </select>
        <select class="pagenum browser-default" title="Select page number"></select>
      </th>-->
    </tr>
  	</tfoot>
	<tbody>
	<?php foreach ($historialreportes as $historialreporte): ?>
	<tr>
		<!--<td>
			<?php echo h($historialreporte['Dimensione']['descripcion']); ?>
		</td>
		<td>
			<?php echo h($historialreporte['Factore']['descripcion']); ?>
		</td>-->
		<td>
			<?php echo h($historialreporte['Estandare']['titulo']); ?>
		</td>
		<td>
<?php if(!empty($historialreporte['Fdesagregada']['filename_dir'])&&($historialreporte['Fdesagregada']['unidadresp']='INSTITUCIONAL')):?>	
		<a class="waves-effect waves-light btn blue" href='<?php echo $this->Html->url("../files/fdesagregada/filename/".$historialreporte['Fdesagregada']['filename_dir']."/".$historialreporte['Fdesagregada']['filename']);?>' target="_blank"><?php echo h($historialreporte['Fdesagregada']['descripcion']); ?></a>
<?php //endif;?>
<?php elseif(!empty($historialreporte['Historialreporte']['filename_dir'])):?>
		<a class="waves-effect waves-light btn blue" href='<?php echo $this->Html->url("../files/historialreporte/filename/".$historialreporte['Historialreporte']['filename_dir']."/".h($historialreporte['Historialreporte']['filename']));?>' target="_blank"><?php echo h($historialreporte['Fdesagregada']['descripcion']); ?></a>
<?php else:?>
			<?php echo h($historialreporte['Fdesagregada']['descripcion']); ?>
<?php endif;?>
			<?php //echo h($historialreporte['Fdesagregada']['descripcion']); ?>
		</td>
		<td>
			<?php echo h($historialreporte['Fdesagregada']['unidadresp']); ?>
		</td>
		<?php if($historialreporte['Fdesecproject']['avancetecnico']<50||empty($historialreporte['Fdesecproject']['avancetecnico'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Fdesecproject']['avancetecnico']); ?>
		</td>
		<?php endif;?>
		<?php if($historialreporte['Fdesecproject']['avancetecnico']>=50&&$historialreporte['Fdesecproject']['avancetecnico']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Fdesecproject']['avancetecnico']); ?>
		</td>
		<?php endif;?>
		<?php if($historialreporte['Fdesecproject']['avancetecnico']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Fdesecproject']['avancetecnico']); ?>
		</td>
		<?php endif;?>

		<?php if($historialreporte['Fdesecproject']['avanceevaluador']<50||empty($historialreporte['Fdesecproject']['avanceevaluador'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Fdesecproject']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($historialreporte['Fdesecproject']['avanceevaluador']>=50&&$historialreporte['Fdesecproject']['avanceevaluador']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Fdesecproject']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<?php if($historialreporte['Fdesecproject']['avanceevaluador']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center;">
			<?php echo h($historialreporte['Fdesecproject']['avanceevaluador']); ?>
		</td>
		<?php endif;?>
		<td class="actions">
			<?php echo $this->Html->link(__('Evaluar'), array('action' => 'justificarevaluador',$historialreporte['Historialreporte']['id'],$secassign['Secassign']['id']),array('class'=>'waves-effect waves-light btn tea')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
<?php echo $this->element('paginador'); ?>
</div>
</div>
<?php echo $this->Session->flash();?>

<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('Fuentes de SGC (Modelo AUDIT)',true));?></h4>
					
	<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'indexeval')); ?>
	

<table class="striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id',__("N°",true)); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('procedimiento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('evidencia_id'); ?></th>
			<th><?php echo __('% de Avance'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($fuentes as $fuente): ?>
	<tr>
		<td><?php echo h($fuente['Fuente']['id']); ?>&nbsp;</td>
		<td>
		<?php 
			if(!empty($fuente['Fuente']['filename_dir'])){
		?>
			<a class="waves-effect waves-light btn teal" href='<?php echo $this->Html->url("../files/fuente/filename/".$fuente['Fuente']['filename_dir']."/".$fuente['Fuente']['filename']);?>' target="_blank"><?php echo $fuente['Fuente']['descripcion']; ?></a>
		<?php
			}else{
		?>
			<?php echo $fuente['Fuente']['descripcion']; ?>
		<?php
			}
		?>
		</td>
		<td>
			<?php echo $fuente['Procedimiento']['descripcion']; ?>
		</td>
		<td>
			<?php echo $fuente['Evidencia']['descripcion']; ?>
		</td>
		<?php if($fuente['Fuente']['avance']<50||empty($fuente['Fuente']['avance'])):?>
		<td style="background-color:#db2828; border: 1px solid white; text-align: center; color: white;">
			<?php echo h($fuente['Fuente']['avance']); ?>
		</td>
		<?php endif;?>
		<?php if($fuente['Fuente']['avance']>=50&&$fuente['Fuente']['avance']<80):?>
		<td style="background-color:#FFD700; border: 1px solid white; text-align: center; color: black;">
			<?php echo h($fuente['Fuente']['avance']); ?>
		</td>
		<?php endif;?>
		<?php if($fuente['Fuente']['avance']>79):?>
		<td style="background-color:#21ba45; border: 1px solid white; text-align: center; color: white;">
			<?php echo h($fuente['Fuente']['avance']); ?>
		</td>
		<?php endif;?>
		<td class="actions">
			<?php echo $this->Html->link(__('Justificar'), array('action' => 'justificar', $fuente['Fuente']['id']),array('class'=>'waves-effect waves-light btn indigo')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
<?php echo $this->element('paginador'); ?>
</div>
</div>
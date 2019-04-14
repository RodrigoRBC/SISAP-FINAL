<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('ProjectListar',true));?></h4>	
<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'indexobservaciones')); ?>
<?php if(isset($secprojects) && !empty($secprojects)): ?>
<table class="striped">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('Secorganization.name',__('organizacion', true)); ?></th>
			<th><?php echo $this->Paginator->sort('Secproject.name',__('ProjectVer', true)); ?></th>		
			<th class="actions"><?php echo __('Actions', true); ?></th>
		</tr>			
	</thead>
	<tbody>
		<?php foreach($secprojects as $secproject):
			$status = $secproject['Secproject']['status']; ?> 
		<tr>
			<td><?php echo $secproject['Secorganization']['name']; ?></td>
			<td><?php echo $secproject['Secproject']['name']; ?></td>
			<td class="actions">		
			<?php  echo $this->Html->link(__('OBSERVACIONES'),array('action'=>'oficiopdf',$secproject['Secproject']['id']),array('class'=>'waves-effect waves-light btn deep-orange','target'=>'_blank')); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>	
</table>
<?php endif; ?>
<?php echo $this->element('paginador'); ?>
</div>
</div>
<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('ProjectListar',true));?></h4>	
<?php echo $this->Element('agregar'); ?>				
<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'index')); ?>
<?php if(isset($secprojects) && !empty($secprojects)): ?>
<table class="striped">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('Secorganization.name',__('organizacion', true)); ?></th>
			<th><?php echo $this->Paginator->sort('Secproject.code',__('codigo', true)); ?></th>
			<th><?php echo $this->Paginator->sort('Secproject.name',__('ProjectVer', true)); ?></th>
			<th><?php echo $this->Paginator->sort('Secproject.photo1',__('ProjectPhoto1', true)); ?></th>
			<th><?php echo $this->Paginator->sort('Secproject.address',__('direccion', true)); ?></th>
			<th><?php echo $this->Paginator->sort('Secproject.text1',__('ProjectText1', true)); ?></th>		
			<th><?php echo $this->Paginator->sort('Secproject.status',__('estado', true)); ?></th>			
			<th class="actions"><?php echo __('Actions', true); ?></th>
		</tr>			
	</thead>
	<tbody>
		<?php foreach($secprojects as $secproject):
			$status = $secproject['Secproject']['status']; ?> 
		<tr>
			<td><?php echo $secproject['Secorganization']['name']; ?></td>
			<td><?php echo $secproject['Secproject']['code']; ?></td>
			<td><?php echo $secproject['Secproject']['name']; ?></td>
			<td><?php echo $secproject['Secproject']['photo1']; ?></td>
			<td><?php echo $secproject['Secproject']['address']; ?></td>
			<td><?php echo $secproject['Secproject']['text1']; ?></td>			
			<td>
				<?php echo $status == 'AC' ? __('Enable', true) : ($status == 'DE' ? __('Disable', true) : __('Limited', true)); ?>
			</td>
			<td class="actions">
				<?php echo $this->Element('action', array(
					'id' => $secproject['Secproject']['id'], 
					'name' => $secproject['Secproject']['name'], 
					'estado' => $secproject['Secproject']['status']
				)); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>	
</table>
<?php endif; ?>
<?php echo $this->element('paginador'); ?>
</div>
</div>
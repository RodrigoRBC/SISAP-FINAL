<?php echo $this->Session->flash();?>
<div class="row">
	<div class="col s12 m12 112">
		<h4 class="header2"><?php echo (__('Lista de Ubigeos',true));?></h4>
		<?php echo $this->Element('agregar'); ?>
		<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'index')); ?>
		<table class="striped">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('Arbubigeo.id',__('IDENTIFICADOR', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbubigeo.code',__('CODIGO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbubigeo.district',__('DISTRITO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbubigeo.province',__('PROVINCIA', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbubigeo.department',__('DEPARTAMENTO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbubigeo.status',__('ESTADO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbubigeo.created',__('FECHA CREADO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbubigeo.modified',__('FECHA MODIFICADO', true)); ?></th>
					<th class="actions"><?php echo __('ACCIONES',true); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($arbubigeos as $arbubigeo): ?>
				<tr>
					<td><?php echo h($arbubigeo['Arbubigeo']['id']); ?>&nbsp;</td>
					<td><?php echo h($arbubigeo['Arbubigeo']['code']); ?>&nbsp;</td>
					<td><?php echo h($arbubigeo['Arbubigeo']['district']); ?>&nbsp;</td>
					<td><?php echo h($arbubigeo['Arbubigeo']['province']); ?>&nbsp;</td>
					<td><?php echo h($arbubigeo['Arbubigeo']['department']); ?>&nbsp;</td>
					<td><?php echo h($arbubigeo['Arbubigeo']['status']); ?>&nbsp;</td>
					<td><?php echo h($arbubigeo['Arbubigeo']['created']); ?>&nbsp;</td>
					<td><?php echo h($arbubigeo['Arbubigeo']['modified']); ?>&nbsp;</td>
					<td class="actions" style="width: 100px">
						<?php
							$id = $arbubigeo['Arbubigeo']['id'];
							$name = $arbubigeo['Arbubigeo']['code'];
							$status = $arbubigeo['Arbubigeo']['status'];

							echo $this->element('action', array('id'=>$id, 'name'=>$name,'estado'=>$status));
						?>
						</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php echo $this->element('paginador'); ?>
	</div>
</div>

<?php echo $this->Session->flash();?>
<div class="row">
	<div class="col s12 m12 112">
		<h4 class="header2"><?php echo (__('Lista de Tasas',true));?></h4>
		<?php echo $this->Element('agregar'); ?>
		<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'index')); ?>
		<table class="striped">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('Arbrate.id',__('IDENTIFICADOR', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbrate.total_cost',__('COSTO TOTAL', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbrate.number_of_inhabitants',__('N.° HABITANTES', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbrate.year_and_month',__('AÑO Y MES', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbrate.monthly_rate',__('TASA MENSUAL', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbrate.status',__('ESTADO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbrate.created',__('FECHA CREADO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbrate.modified',__('FECHA MODIFICADO', true)); ?></th>
					<th class="actions"><?php echo __('ACCIONES',true); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($arbrates as $arbrate): ?>
				<tr>
					<td><?php echo h($arbrate['Arbrate']['id']); ?>&nbsp;</td>
					<td><?php echo h($arbrate['Arbrate']['total_cost']); ?>&nbsp;</td>
					<td><?php echo h($arbrate['Arbrate']['number_of_inhabitants']); ?>&nbsp;</td>
					<td><?php echo h($arbrate['Arbrate']['year_and_month']); ?>&nbsp;</td>
					<td><?php echo h($arbrate['Arbrate']['monthly_rate']); ?>&nbsp;</td>
					<td><?php echo h($arbrate['Arbrate']['status']); ?>&nbsp;</td>
					<td><?php echo h($arbrate['Arbrate']['created']); ?>&nbsp;</td>
					<td><?php echo h($arbrate['Arbrate']['modified']); ?>&nbsp;</td>
					<td class="actions" style="width: 100px">
						<?php
							$id = $arbrate['Arbrate']['id'];
							$name = $arbrate['Arbrate']['year_and_month'];
							$status = $arbrate['Arbrate']['status'];

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

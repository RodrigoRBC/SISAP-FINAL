<?php echo $this->Session->flash();?>
<div class="row">
	<div class="col s12 m12 112">
		<h4 class="header2"><?php echo (__('Lista de Beneficiarios',true));?></h4>
		<?php echo $this->Element('agregar'); ?>
		<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'index')); ?>
		<table class="striped">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('Arbperson.id',__('IDENTIFICADOR', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.arbubigeo_id',__('UBIGEO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.dni',__('N.° D.N.I.', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.names',__('NOMBRES', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.first_surname',__('APELLIDO PATERNO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.second_surname',__('APELLIDO MATERNO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.status',__('ESTADO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.created',__('FECHA CREADO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.modified',__('FECHA MODIFICADO', true)); ?></th>
					<th class="actions"><?php echo __('ACCIONES',true); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($arbpeople as $arbperson): ?>
				<tr>
					<td><?php echo h($arbperson['Arbperson']['id']); ?>&nbsp;</td>
					<td><?php echo h($arbperson['Arbperson']['arbubigeo_id']); ?>&nbsp;</td>
					<td><?php echo h($arbperson['Arbperson']['dni']); ?>&nbsp;</td>
					<td><?php echo h($arbperson['Arbperson']['names']); ?>&nbsp;</td>
					<td><?php echo h($arbperson['Arbperson']['first_surname']); ?>&nbsp;</td>
					<td><?php echo h($arbperson['Arbperson']['second_surname']); ?>&nbsp;</td>
					<td><?php echo h($arbperson['Arbperson']['status']); ?>&nbsp;</td>
					<td><?php echo h($arbperson['Arbperson']['created']); ?>&nbsp;</td>
					<td><?php echo h($arbperson['Arbperson']['modified']); ?>&nbsp;</td>
					<td class="actions" style="width: 100px">
						<?php
							$id = $arbperson['Arbperson']['id'];
							$name = $arbperson['Arbperson']['first_surname'].' '.$arbperson['Arbperson']['second_surname'].', '.$arbperson['Arbperson']['names'];
							$status = $arbperson['Arbperson']['status'];
							echo $this->element('action', array('id'=>$id, 'name'=>$name,'estado'=>$status));
							echo $this->Html->link('<i class="mdi-action-print" title ="Imprimir Reporte"></i>', array('action' => 'generate_payment_report', $id), array('escape'=>false));
						?>
						</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php echo $this->element('paginador'); ?>
	</div>
</div>

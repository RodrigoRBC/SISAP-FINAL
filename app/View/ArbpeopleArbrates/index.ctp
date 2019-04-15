
<?php echo $this->Session->flash();?>
<div class="row">
	<div class="col s12 m12 112">
		<h4 class="header2"><?php echo (__('Lista de Situación de Pagos',true));?></h4>
		<?php echo $this->Element('agregar'); ?>
		<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'index')); ?>
		<table class="striped">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('ArbpeopleArbrate.arbperson_id',__('PERSONA', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.arbubigeo_id',__('UBIGEO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.arbitration_rate',__('TASA DE ARBITRIO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.payment_status',__('SITUACION DE PAGO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.payment_date',__('FECHA DE PAGO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.document',__('DOCUMENTO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.status',__('ESTADO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.created',__('FECHA CREADO', true)); ?></th>
					<th><?php echo $this->Paginator->sort('Arbperson.modified',__('FECHA MODIFICADO', true)); ?></th>
					<th class="actions"><?php echo __('ACCIONES',true); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($arbpeopleArbrates as $arbpeopleArbrate): ?>
				<tr>
					<td>
						<?php echo $this->Html->link($arbpeopleArbrate['Arbperson']['id'], array('controller' => 'arbpeople', 'action' => 'view', $arbpeopleArbrate['Arbperson']['id'])); ?>
					</td>
					<td>
						<?php echo $this->Html->link($arbpeopleArbrate['Arbrate']['id'], array('controller' => 'arbrates', 'action' => 'view', $arbpeopleArbrate['Arbrate']['id'])); ?>
					</td>
					<td><?php echo h($arbpeopleArbrate['Arbperson']['id']); ?>&nbsp;</td>
					<td><?php echo h($arbpeopleArbrate['Arbrate']['id']); ?>&nbsp;</td>
					<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['arbitration_rate']); ?>&nbsp;</td>
					<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['payment_status']); ?>&nbsp;</td>
					<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['payment_date']); ?>&nbsp;</td>
					<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['document']); ?>&nbsp;</td>
					<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['status']); ?>&nbsp;</td>
					<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['created']); ?>&nbsp;</td>
					<td><?php echo h($arbpeopleArbrate['ArbpeopleArbrate']['modified']); ?>&nbsp;</td>
					<td class="actions" style="width: 100px">
						<?php
							$id = $arbperson['Arbperson']['dni'];
							$name = $arbperson['Arbperson']['first_surname'].' '.$arbperson['Arbperson']['second_surname'].', '.$arbperson['Arbperson']['names'];
							$status = $arbperson['Arbperson']['status'];

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

<?php echo $this->Session->flash();?>

<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('empresaListar',true));?></h4>		
		
			<?php echo $this->Element('agregar'); ?>
				
			<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'index')); ?>

		<table class="striped">
			<thead>
				<tr>
				<th><?php echo $this->Paginator->sort('Secorganization.code',__('Codigo',true));?></th>
				<th><?php echo $this->Paginator->sort('Secorganization.name',__('Nombre',true));?></th>
				<th><?php echo $this->Paginator->sort('Secorganization.type',__('Empresa',true));?></th>
				<th><?php echo $this->Paginator->sort('Secorganization.thema',__('Tema',true));?></th>
				<th><?php echo $this->Paginator->sort(__('empresaEncabezadoIndex',true));?></th>
				<th><?php echo $this->Paginator->sort(__('empresaPhoto2Index',true));?></th>
				<th><?php echo $this->Paginator->sort('Secorganization.text1',__('Texto 1',true));?></th>
				<th><?php echo $this->Paginator->sort('Secorganization.text2',__('Texto 2',true));?></th>
				<th><?php echo $this->Paginator->sort('Secorganization.status',__('Estado',true));?></th>
				<th class="actionsfijo"><?php  echo __('Actions');?></th>
			
			</tr>		
			</thead>
			
			<tbody>
				<?php  foreach ($secorganizations as $secorganization):?>
				<tr>
					<td><?php echo $secorganization['Secorganization']['code']; ?>
				</td>
				<td><?php echo $secorganization['Secorganization']['name']; ?>
				</td>
				<td>
					<?php echo 
						$secorganization['Secorganization']['type'] == 0? __('propia', true): 
							 $secorganization['Secorganization']['type']== 1? __('cliente', TRUE): __('proveedor',TRUE);
					?>
				</td>
				<td><?php echo $secorganization['Secorganization']['thema']; ?>
				</td>
				<td><?php echo $secorganization['Secorganization']['photo1']; ?>
				</td>
				<td><?php echo $secorganization['Secorganization']['photo2']; ?>
				</td>
				<td><?php echo $secorganization['Secorganization']['text1']; ?>
				</td>
				<td><?php echo $secorganization['Secorganization']['text2']; ?>
				</td>
				<td>
					<?php echo $secorganization['Secorganization']['status'] == 'AC' ? 
									__('Enable',true)
								:
									($secorganization['Secorganization']['status'] == 'DE'?
										__('Disable',true)
									:
										__('Limited',true))
								; ?>
				</td>
		
					<td class="actionsfijo">
				<?php echo $this->Element('action', 
								array('id'=>$secorganization['Secorganization']['id'], 
										'name'=> $secorganization['Secorganization']['name'],
										'estado'=> $secorganization['Secorganization']['status'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php echo $this->element('paginador'); ?>
</div>
</div>
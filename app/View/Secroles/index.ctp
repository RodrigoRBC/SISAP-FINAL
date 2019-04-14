<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('Roles',true));?></h4>
			
	<?php echo $this->Element('agregar'); ?>
				
	<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'index')); ?>
	
<table class="striped">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('Secorganization.name',__('organizacion',true));?></th>
			<th><?php echo $this->Paginator->sort('Secrole.code',__('codigo',true));?></th>
			<th><?php echo $this->Paginator->sort('Secrole.name',__('rol',true));?></th>
			<th><?php echo $this->Paginator->sort('Secrole.status',__('estado',true));?></th>
			<th style="width:90px" class="actions"><?php echo __('Actions');?></th>
		</tr>			
	</thead>
	
	<tbody>
		<?php  foreach ($secroles as $secrole):?>
		<tr>
			<td>
				<?php echo $secrole['Secorganization']['name']; ?>
			</td>
			<td>
				<?php echo $secrole['Secrole']['code']; ?>
			</td>
			<td>
				<?php echo $secrole['Secrole']['name']; ?>
			</td>
			<td>
				<?php 				
				echo $secrole['Secrole']['status'] == 'AC' ? 
							__('Enable',true)
						:
							($secrole['Secrole']['status'] == 'DE'?
								__('Disable',true)
							:
								__('Limited',true))
						; ?>
			</td>
			
			<td class="actions">
				<?php echo $this->Element('action', 
								array('id'=> $secrole['Secrole']['id'], 
										'name'=> $secrole['Secrole']['name'],
										'estado'=> $secrole['Secrole']['status'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<?php echo $this->Element('paginador'); ?>
</div>
</div>

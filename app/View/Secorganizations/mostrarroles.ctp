<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('Roles',true)).' '. $secorganization['Secorganization']['name'];?></h4>

<table class="striped" >
	<thead>
		<tr>
			<th><?php echo (__('codigo',true));?></th>
			<th><?php echo (__('nombre',true));?></th>
			<th><?php echo (__('estado',true));?></th>
		</tr>
	</thead>

	<tbody>
		<?php  foreach ($secroles as $secrole):?>
		<tr>
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

		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>

	<div class="input-field center col s12">
			<?php  echo $this->Html->link(__('cerrar',true),'index',array('class'=>'waves-effect waves-light btn')); ?>
	</div>
	
</div>
</div>
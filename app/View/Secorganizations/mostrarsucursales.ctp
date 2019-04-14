<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('ProjectListar',true)).' '. $secorganization['Secorganization']['name'];?></h4>

<table class="striped" >
	<thead>
		<tr>
			<th><?php echo (__('codigo'));?></th>
			<th><?php echo (__('nombre'));?></th>
			<th><?php echo (__('ProjectPhoto1'));?></th>
			<th><?php echo (__('ProjectPhoto2'));?></th>
			<th><?php echo (__('ProjectText1'));?></th>
			<th><?php echo (__('ProjectText2'));?></th>
			<th><?php echo (__('estado'));?></th>			
		</tr>			
	</thead>
	
	<tbody>
			<?php foreach ($secprojects as $secproject): ?>
	<tr>
		<td><?php echo $secproject['Secproject']['code']; ?>
		</td>
		<td><?php echo $secproject['Secproject']['name']; ?>
		</td>
		<td><?php echo $secproject['Secproject']['photo1']; ?>
		</td>
		<td><?php echo $secproject['Secproject']['photo2']; ?>
		</td>
		<td><?php echo $secproject['Secproject']['text1']; ?>
		</td>
		<td><?php echo $secproject['Secproject']['text2']; ?>
		</td>		
		<td>
		
		<?php echo $secproject['Secproject']['status'] == 'AC' ? 
							__('Enable',true)
						:
							($secproject['Secproject']['status'] == 'DE'?
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
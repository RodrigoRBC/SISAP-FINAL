	<?php echo $this->Html->script('tqcclases/index.js', false); ?>
	<?php echo $this->Html->script('tqcclases/add_edit.js', false); ?>

	<?php $this->Session->flash();?>
	<br/>
	<div class="ui blue inverted segment"><?php echo __('variableProduccion', TRUE);?></div>
<div>
<table class="ui selectable celled table">
		<thead>
	<tr>
		<th><?php echo __('periodoEspera',true);?></th>
		<th><?php echo __('nielServicio',true);?></th>
		<th><?php echo __('tamanioLote',true);?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	</thead>
		<tbody>
			<tr>
				<td>
					<?php echo $logistica['Secorganization']['vplperiodoespera']; ?>
				</td>
				<td>
					<?php echo $logistica['Secorganization']['vplnielservicio']; ?>
				</td>
				<td>
					<?php echo $logistica['Secorganization']['vpltamaniolote'] 
					?>
				</td>
	
				<td class="actions">
					<?php 
							$url = $this->Html->url(array('action'=>'logisticaedit', $logistica['Secorganization']['id']));
							$image = $this->Html->image('editar.png', array('title'=>__('editar',true), "alt" => "Editar"));
							echo $this->Html->link($image, 'javascript:;',array('onclick' => "editar('".$url."')"), null, false);
					?>
				</td>
			</tr>
			</tbody>
</table>
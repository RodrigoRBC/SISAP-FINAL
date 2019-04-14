<div class="row">
	<div class="col s12 m9 110">
	<div>
		<h4><?php echo __('Entidades que solicitan control', TRUE);?></h4>

<?php	foreach($aros as $key => $aro)		
			{				
				if(!empty($aro['Aro']['alias']))
				{
					echo $aro['Aro']['listaDesordenada'];echo $aro['Aro']['alias'];
					
					echo '&nbsp;'.$this->Html->link('<i class="mdi-image-tune blue-text" title ="Permisos"></i>',
												  array('controller'=>'secaccesses','action'=>'listapermisos',$aro['Aro']['id']),
												  array('escape'=>false),
												  null);
												  
					if(empty($aro['Aro']['parent_id']))
						echo '&nbsp;'.$this->Html->link('<i class="mdi-navigation-menu green-text" title ="Menu"></i>',
												  array('controller'=>'secprograms','action'=>'listprograms',$aro['Aro']['id']),
												  array('escape'=>false),
												  null);
				}
				else
					echo $aro['Aro']['listaDesordenada'];
			}
?>
	</div>
		
	</div>
</div>
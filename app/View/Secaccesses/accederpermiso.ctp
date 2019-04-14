<div class="row">
	<div class="col s12 m9 110">
	<div>
		<h4><?php echo 'Lista de Acciones Para: '.$grupo_usuario; ?></h4>
<?php	foreach($listaDeAccesos as $key => $item)		
		{				
			if(!empty($item['listaDeAccesos']['controlador']))
			{
				echo $item['listaDeAccesos']['listaDesordenada'];echo $item['listaDeAccesos']['controlador'];	
			}
			elseif(!empty($item['listaDeAccesos']['controladores']))
			{
				echo $item['listaDeAccesos']['listaDesordenada'];echo $item['listaDeAccesos']['controladores'];
			}
			elseif(!empty($item['listaDeAccesos']['acciones']))
			{
				echo $item['listaDeAccesos']['listaDesordenada'];echo $item['listaDeAccesos']['acciones'];
			}
			
			if(!empty($item['listaDeAccesos']['acos_id']))
			{
			echo '&nbsp;'.$this->Html->link('<i class="mdi-maps-beenhere green-text" title ="PERMITIR"></i>',
											  array('controller'=>'secaccesses','action'=>'permitir',0,$aros_id,$item['listaDeAccesos']['acos_id']),
											  array('escape'=>false),
											  null,
											  false);
											  
			echo '&nbsp;'.$this->Html->link('<i class="mdi-notification-do-not-disturb red-text" title ="DENEGAR"></i>',
									  array('controller'=>'secaccesses','action'=>'denegarpermiso',0,$aros_id,$item['listaDeAccesos']['acos_id']),
									  array('escape'=>false),
									  null,
									  false);
			}
			if(empty($item['listaDeAccesos']['controlador']) && empty($item['listaDeAccesos']['controladores']) && empty($item['listaDeAccesos']['acciones']))
				echo $item['listaDeAccesos']['listaDesordenada'];
		}
?>
	</div>
		
	</div>
</div>
<div class="left">
<div class="input-field col s6">
	<div class="row">
	<div class="input-field col s3">
	<?php 	
		$url = isset($url)?$url:'adddocente';

		echo $this->Html->link('<i class="mdi-av-my-library-add blue-text" title ="Agregar"></i>', 
					array('action'=>'adddocente'), array('escape'=>false)); 
	?>
	</div>
		&nbsp;
	<div class="input-field col s3">
		<?php 
			echo $this->Html->link(__('Add', true),array("action"=>$url)); 
		?>
	</div>		
	</div>
</div>
</div>
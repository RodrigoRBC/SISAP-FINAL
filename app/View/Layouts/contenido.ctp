<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="descripcion" content="Sistema de Restaurant">
	<meta name="autor" content="Miguel Chiuyari">
	<meta name="email" content="541ntmik@gmail.com">
	<noscript>
		<META http-equiv="REFRESH" content="0;URL=<?php echo $this->base ?>">
	</noscript>
	<!-- Framework CSS -->
	<?php
		echo $this->Html->script('jquery');
		echo $this->Html->script('jquery-1.3.2.min.js');
		echo $this->Html->script('jquery-validate/jquery.validate.js');
		echo $this->Html->script('jquery-treeview/jquery.cookie.js');
		echo $this->Html->script('jquery-treeview/jquery.treeview.js');

		if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)=='es'){
			echo $this->Html->script('jquery-validate/localization/messages_es.js');
		};

		echo $this->Html->meta('icon');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        
		echo $this->Html->css('mycss');
		echo $this->Html->script('semantic/semantic.min');
		echo $this->Html->css('semantic/semantic.min');
	?>
	
	<?php echo $scripts_for_layout; ?>	

	<style type="text/css">	 
		#contenido { 
			width: 100%; min-height: 97%;
		} 
		#footer {
		    height:30px; width:100%;
		}
	</style>
	
	<!-- Url base para ajax -->
	<base href="<?php echo Router::url('/',true); ?>" permisorol="<?php echo empty($datosLogeo)?array():$datosLogeo['0']['Secrole']['name']; ?>" />
	
</head>

<body id="general">
<div id="contenido">
<div class="ui stackable grid">
    <div class="sixteen wide column">            
			<div id="datosUsuario" class="ui five blue inverted item stackable tabs menu">
				
					<?php if(!empty($datosLogeo)): ?>
					
					<a class="item" style='text-decoration: none;color:#FFF;'>	
						<?php						
							echo '<i class="home icon"></i>';
							  echo $datosLogeo['0']['Secorganization']['name'];
						?>
					</a>&nbsp;
					<a class="item" style='text-decoration: none;color:#FFF;'>	
						<?php echo '<i class="money icon"></i>';
							  echo $datosLogeo['0']['Secproject']['name']; ?>					
					</a>&nbsp;
					<a class="item" style='text-decoration: none;color:#FFF;'>	
						<?php echo '<i class="users icon"></i>';
							  echo $datosLogeo['0']['Secrole']['name'];					
						?>					
					</a>&nbsp;
					<a class="item" style='text-decoration: none;color:#FFF;'>	
						<?php echo '<i class="user icon"></i>';
							  echo $datosLogeo['0']['Secperson']['appaterno'].' '.$datosLogeo['0']['Secperson']['apmaterno'].', '.$datosLogeo['0']['Secperson']['firstname'];
						?>	
					</a>&nbsp;&nbsp;&nbsp;
					<?php endif; ?>
				
								
						<?php 
								echo $this->Html->link('<i class="adjust icon"></i>'.__(' Logout',true),
								array('controller'=> 'Secassigns', 'action'=>'logout'), array('class'=>'active item','style' => 'text-decoration: none;color:#FFF;','escape'=>false),null); 
						?>	
					&nbsp;
			</div><!-- datosUsuario -->
    </div>

    <div class="four wide column">        
				<!--MENU-->
				<div id="desplaegable" ng-show="ctrl.tabIndex == 1" class="ui blue menu vertical inverted"><a class="item active"><?php echo __('Menú');?><i class="home icon"></i></a>
					<?php if(!empty($menu)):?>				
					<?php foreach($menu as $item):?>
					<?php if(!empty($item['secprograms']['etiqueta'])): ?>
					<?php if(empty($item['secprograms']['solicitado'])): ?>
					  <div class="item"> <i class="setting icon"></i><?php echo html_entity_decode($item['secprograms']['listaDesordenada']); echo html_entity_decode($item['secprograms']['etiqueta']);?>
					  </div>	
						<?php else: ?>	
					    <div class="menu">
					     	<?php echo html_entity_decode($item['secprograms']['listaDesordenada']);
														  echo $this->Html->link(__($item['secprograms']['etiqueta'], true), '/'.$item['secprograms']['solicitado'], array('class'=>'item') ); ?>
						</div>
						<?php endif; ?>
					<?php else: ?>	
						<?php echo html_entity_decode($item['secprograms']['listaDesordenada']); ?>
					<?php endif; ?>	
					<?php endforeach; ?>
					<?php endif; ?>
				</div>
    </div>
    <div class="twelve wide column">        
				<div id="contenido" class="ui segment">
					<?php echo $this->Session->flash();
							echo $this->Session->flash('auth');?>
					<?php echo $content_for_layout; ?>
				</div> <!-- contenido -->
    </div>
  </div>

</div> <!-- container -->
	<?php echo $this->Js->writeBuffer(); // Write cached scripts ?>

<div id="footer">
	<div class="ui blue inverted vertical center aligned footer segment">
		<div class="ui container">
			<?php echo "copyright &copy; Miguel Angel Chiuyari Veramendi | E-mail:541ntmik@gmail.com | Todos los derechos reservados"; ?>
		</div>
	</div>
</div>
	

</body>
</html>
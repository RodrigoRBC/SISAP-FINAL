<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout;?>
	</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="descripcion" content="Sistema de Restaurant">
	<meta name="autor" content="Miguel Chiuyari">
	<meta name="email" content="541ntmik@gmail.com">
	<base id="dtBase" href="<?php echo Router::url('/'); ?>" permisorol="<?php //echo $datosLogeo['0']['Secrole']['name']; ?>" />

	<?php
		echo $this->Html->script('jquery.min.js');
		echo $this->Html->script('semantic/semantic.min');
		echo $this->Html->css('semantic/semantic.min');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');

	?>
	
	
	<?php echo $scripts_for_layout; ?>	
	
	<!-- Url base para ajax -->
	<base href="<?php echo Router::url('/',true); ?>" permisorol="<?php echo empty($datosLogeo)?array():$datosLogeo['0']['Secrole']['name']; ?>" />
	
</head>

<body id="general">       
				<div id="contenido">
					<?php echo $this->Session->flash();
							echo $this->Session->flash('auth');?>
					<?php echo $content_for_layout; ?>
				</div> <!-- contenido -->
</div> <!-- container -->
	<?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
	

</body>
</html>
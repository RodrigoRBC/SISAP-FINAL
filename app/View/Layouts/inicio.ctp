
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="descripcion" content="Sistema">
  <meta name="autor" content="Miguel Chiuyari">
  <meta name="email" content="541ntmik@gmail.com">

	<?php

		echo $this->Html->css('materialize.min.css');
		echo $this->Html->css('materializecss-icon.css');
		echo $this->Html->css('style.min.css');
		echo $this->Html->css('custom/custom.min.css');
		echo $this->Html->css('layouts/page-center.css');

		echo $this->Html->css('../js/plugins/prism/prism.css');
		echo $this->Html->css('../js/plugins/perfect-scrollbar/perfect-scrollbar.css');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
	?>
		
	<?php echo $scripts_for_layout; ?>	
	
</head>

<body class="cyan">

  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>


	<?php echo $this->Session->flash();
			echo $this->Session->flash('auth');	?>
	<?php echo $content_for_layout; ?>


	<?php 
		echo $this->Html->script('plugins/jquery.min.js');

		echo $this->Html->script('materialize.min.js');
		echo $this->Html->script('plugins/prism/prism.js');
		echo $this->Html->script('plugins/perfect-scrollbar/perfect-scrollbar.min.js');
		
		echo $this->Html->script('plugins.min.js');
		echo $this->Html->script('custom-script.js');
    	echo $this->Html->script('message.js');
	?>


	<?php echo $scripts_for_layout; ?>
	<?php echo $this->Js->writeBuffer(); ?>
	
</body>
</html>
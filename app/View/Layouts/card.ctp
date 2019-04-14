<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="descripcion" content="Sistema de Restaurant">
	<meta name="autor" content="Miguel Chiuyari">
	<meta name="email" content="541ntmik@gmail.com">
	<link rel="icon" href="favicon.ico">
	<title>Card UI</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<?php 

		echo $this->Html->script('semantic/jquery.min.js');
		echo $this->Html->script('semantic/semantic.min');
		echo $this->Html->css('semantic/semantic.min');
		echo $this->Html->css('card.ui/css/styles.css'); ?>

</head>
<body>
		<div id="content">
			<?php
                if ($this->Session->check('Message.flash'))	{
					$this->Session->flash();
				}
				echo $content_for_layout;
			?>
		</div>

    
<?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo "SIS" ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php echo $this->Html->meta('icon');?>
	<?php echo $this->Html->script('jquery-1.6.1.min.js'); ?>
	<?php echo $this->Html->script('easyui/jquery.easyui.min.js'); ?>
	<?php //echo $this->Html->css('demo/demo.css'); ?>
	<?php echo $this->Html->css('themes/icon.css'); ?>
	<?php echo $this->Html->css('themes/color.css'); ?>
	<?php echo $this->Html->css('themes/default/easyui.css'); ?>
		
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>

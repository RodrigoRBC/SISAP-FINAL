
<h2><?php echo /*$message*/'Error 404'; ?></h2>
<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php echo __d('cake', '404 Error - Pagina no Encontrada.'); ?>
</p>
<?php
if (Configure::read('debug') > 0):
	//echo $this->element('exception_stack_trace');
endif;
?>
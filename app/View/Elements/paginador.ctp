<div class="col s12">
	<div class="row">
	<div class="input-field col s4">
	<blockquote  style="border-left: #00bcd4"  class="left">
		<?php echo $this->Paginator->counter(array('format' => __('View %current% of %count%')));?>
	</blockquote>	
	</div>
	<div class="input-field col s4">
	<blockquote  style="border-left: #00bcd4"  class="left">
		<?php echo $this->Paginator->counter(array('format' => __(' Page %page% of %pages% ')));?>
	</blockquote>	
	</div>
	<div class="input-field col s4">
		<ul class="pagination right">
			<li class="waves-effect">
				<?php echo $this->Paginator->prev('<i class="mdi-hardware-keyboard-arrow-left"></i>', array('tag'=>'a','escape'=>false));?>
			</li>
			<?php echo $this->Paginator->numbers(array('sepaprator'=>'','tag'=>'li','currentLink'=>true,'currentClass'=>'active','currentTag'=>'a'));?>
			<li class="waves-effect">
				<?php echo $this->Paginator->next('<i class="mdi-hardware-keyboard-arrow-right"></i>', array('tag'=>'a', 'escape'=>false));?>
			</li>
		</ul>
	</div>
	</div>	
</div>	
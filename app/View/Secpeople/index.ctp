<?php echo $this->Session->flash();?>

<div class="row">
<div class="col s12 m12 112">
<h4 class="header2"><?php echo (__('pesonaListar',true));?></h4>		
			
	<?php echo $this->Element('agregar'); ?>
				
	<?php echo $this->Element('buscador', array('elementos'=>$elementos,'url' => 'index')); ?>

<table class="striped">
	<thead>
		<tr>	
			<th><?php echo $this->Paginator->sort('Secperson.appaterno',__('apellidoNombre', true));?></th>
			<th><?php echo $this->Paginator->sort('Secperson.username',__('usuario', true));?></th>		
			<th><?php echo $this->Paginator->sort('Secperson.privelege',__('privilegio', true));?></th>
			<th><?php echo $this->Paginator->sort('Secperson.language',__('idioma', true));?></th>
			<th><?php echo $this->Paginator->sort('Secperson.status',__('status', true));?></th>
			<th class="actions"><?php echo __('acciones',true);?></th>
		</tr>		
	</thead>
	
	<tbody>
		<?php 
				foreach ($secpeople as $secperson):?>
		<tr>		
		<td>
			<?php echo $secperson['Secperson']['appaterno'].' '.$secperson['Secperson']['apmaterno'].', ',$secperson['Secperson']['firstname']; ?>		
		</td>
		<td class="textc">
			<?php echo $secperson['Secperson']['username']; ?>
		</td>
		<td class="textc">
			<?php echo $secperson['Secperson']['privelege'] == 1 ? __('superUsuario', true):__('usuario', true); ?>
		</td>
		<td class="textc">
			<?php echo $secperson['Secperson']['language'] == 'spa' ?
							__('castellano', true)
						:
							$secperson['Secperson']['language'];
			; ?>
		</td>
		<td class="textc">
			<?php echo $secperson['Secperson']['status'] == 'AC' ? 
							__('Enable',true)
						:
							($secperson['Secperson']['status'] == 'DE'?
								__('Disable',true)
							:
								__('Limited',true))
						; ?>
		</td>
		
			<td class="actions" style="width: 100px">
				<?php echo $this->element('action', 
								array('id'=>$secperson['Secperson']['id'], 
										'name'=>$secperson['Secperson']['appaterno'],
										'estado'=>$secperson['Secperson']['status'])); 

					if($secperson['Secperson']['status'] == 'AC')
					{
						echo $this->Html->link('<i class="mdi-communication-vpn-key orange-text" title ="Modificar Contraseña"></i>', 
								array('action'=>'modificarpasswordusuario',$secperson['Secperson']['id']), array('escape'=>false)); 
					}
					
				?>										
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<?php /*echo $this->Paginator->options(array('url' => 'buscador:'.isset($this->request->data['Buscar']['buscador']).'/valor:'.isset($this->request->data['Buscar']['valor'])).'/desactivo:'.isset($this->request->data['Buscar']['desactivo']));*/ ?>
<?php echo $this->element('paginador'); ?>
</div>
</div>

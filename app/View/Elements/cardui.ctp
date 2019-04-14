<?php $dato = explode("-", $fecha);
switch ($dato[1]) {
	case 1:
		$dato[1]='Ene';
		break;
	case 2:
		$dato[1]='Feb';
		break;
	case 3:
		$dato[1]='Mar';
		break;
	case 4:
		$dato[1]='Abr';
		break;
	case 5:
		$dato[1]='May';
		break;
	case 6:
		$dato[1]='Jun';
		break;
	case 7:
		$dato[1]='Jul';
		break;
	case 8:
		$dato[1]='Ago';
		break;
	case 9:
		$dato[1]='Sep';
		break;
	case 10:
		$dato[1]='Oct';
		break;
	case 11:
		$dato[1]='Nov';
		break;	
	case 12:
		$dato[1]='Dic';
		break;
	default:
		# code...
		break;
}
?>
<article class="card">
	  <header class="card__thumb">
	    <a href="#">
	      <?php echo $this->Html->image('dinner.jpg');?>
	    </a>
	  </header>
	  <div class="card__date">
	    <span class="card__date__day"><?php echo $dato[2];?></span>
	    <span class="card__date__month"><?php echo $dato[1];?></span>
	  </div>
	  <div class="card__body">
	    <div class="card__category"><a href="#">Platos</a></div>
	    <h2 class="card__title"><?php echo $this->Html->link("Pedido de la mesa N° ".$mesa,array('action'=>'pedido_atendido', $id), array('escape'=>false), sprintf(__('Se ha atendido el pedido de la mesa %s?'), $mesa)); ?></h2>
	    <div class="card__subtitle">Restaurant Demo</div>
	    <p class="card__description">
	       <?php foreach ($platos as $key => $plato) {
	       		echo 'Plato = '.$plato['Plato']['descripcion'].' | cantidad = '.$plato['Plato']['cantidad'].' Para llevar: '.$plato['Plato']['llevar'].'<br />';
	       }?>
	    </p>
	  </div>
	  <footer class="card__footer">
	    <span class="icon icon--time"></span>Responsable:
	    <span class="icon icon--comment"></span><a href="#"><?php echo $responsable;?></a>
	  </footer>
</article>
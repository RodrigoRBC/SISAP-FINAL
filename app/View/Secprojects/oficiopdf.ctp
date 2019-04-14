
<style type="text/css">
@page { 
        size: portrait;
    }
    /*body { 
        writing-mode: tb-rl;
    }*/
#receta {
    font-size: 0.9rem;
    /* A6 dimensions */
    /*width: 105mm; height: 148.5mm;*/
    /* A5 dimensions */
    /*width: 148mm;
    height: 210mm;*/
    /* A4 dimensions */
    width: 210mm;
    height: 273mm;

    margin-top: 10px;
}
.ui.page.grid{
  margin:  0px !important;
  padding: 0px !important;
}
#borde {
    border-bottom: 1px solid;
}
@media print{
  .boton {display: none !important;}
}
.boton {
  background: url(http://www.codigopostal.gob.ec/img/i_print.png) /* Url de la imagen */ no-repeat center center/*, #62BC0F*/ /* Color del botón */;
  background-size: 90%; /* Tamaño de la imagen */
  height: 90px;  /* Alto del botón */
  width: 90px;  /* Ancho del botón */
  display: table;
  border-radius: 100%;
  cursor: pointer;
  box-shadow:  inset 0 10px 15px rgba(255,255,255,.35), inset 0 -10px 15px rgba(0,0,0,.05), inset 10px 0 15px rgba(0,0,0,.05), inset -10px 0 15px rgba(0,0,0,.05),  0 5px 20px rgba(0,0,0,.1);
}
/* Al presionar */
.boton:active {
  box-shadow: inset 0 5px 30px rgba(0,0,0,.2); /* Sombra interior */
  background-size: 55%; /* Cambiamos el tamaño de la imagen */
}
#divbottom{
  /*padding-top: 0.01rem;*/
  padding-bottom: 0.25rem;
}
#divbottomcenter{
  padding-top: 0.05rem;
  padding-bottom: 2.05rem;
  text-align: center;
}
#divbottomright{
  padding-top: 0.05rem;
  padding-bottom: 0.05rem;
  text-align: right;
}
#divtitle{margin-top: 15px;
  display: inline-block;
}
</style>

<div class="ui page grid" >
  <div id="receta">
  <div class="ui three column grid">      
      <div class="column" style="width:13%;margin-top:10px;">
        <?php echo $this->Html->image('unheval.png', array('style'=>'width:100%; height:auto;'));  ?>  
      </div>    
      <div class="column" style="width:70%; margin-top:10px;">
        <center>
        <strong><font size="3">UNIVERSIDAD NACIONAL HERMILIO VALDIZAN</font></strong>
        <?php echo '&nbsp;<br/>';?>
        <strong><font size="2">OFICINA DE CALIDAD</font></strong>
        <?php echo '&nbsp;<br/>';?>
        <strong><font size="2">INFORME DE OBSERVACIONES DEL INFORME NRO <?php echo $informe['Informe']['id'];?></font></strong>
        <?php echo '&nbsp;<br/>';?>
        <strong><font size="2"><?php echo $secproject['Secproject']['name'];?></font></center></strong>
      </div>     
      <div class="column" style="width:13%;margin-top:10px;">
        <?php echo $this->Html->image('DCA-icon.jpg', array('style'=>'width:100%; height:auto;'));  ?>  
      </div> 
  </div>

  <div id='divbottom'></div>
  <div id='borde' ></div>
  <div id='divbottom' class="ui segment right floated"><strong>Fecha: <?PHP echo date("d-m-Y");?></strong></div>

  <div id='divbottom'></div>
  <div id='divbottom' ><strong>OBSERVACIONES </strong></div>
  <div id='divbottom' ><strong>ACREDITACIÓN INSTITUCIONAL</strong></div>
  <table class="ui celled table">
    <thead>
      <tr>
        <th><?php echo __('CIRCULO DE MEJORA CONTINUA'); ?></th>
        <th><?php echo __('EST.'); ?></th>
        <th><?php echo __('PRODUCTO'); ?></th>
        <th><?php echo __('RESPONSABLE'); ?></th>
        <th><?php echo __('OBSERVACION'); ?></th>
      </tr>
    </thead>
    <tbody id="cuerpo1">      
    </tbody>
      <?php foreach ($observaciones as $key => $observacion): ?>
      <tr>      
        <td><?php echo $observacion['Cmc']['descripcion'];?></td>
        <td><?php echo $observacion['Estandare']['id'];?></td>       
        <td><?php echo $observacion['Fdesagregada']['descripcion'];?></td>
        <td><?php echo $observacion['Persona']['firstname'].' '.$observacion['Persona']['appaterno'].' '.$observacion['Persona']['apmaterno'];?></td>
        <td><?php echo $observacion['Historiale']['observacion'];?></td>
      </tr>
      <?php endforeach;?> 
    </table>

  <div id='divbottom'></div>
  <div id='divbottom' ><strong>EXTEMPORANEOS </strong></div>
  <div id='divbottom' ><strong>ACREDITACIÓN INSTITUCIONAL</strong></div>
  <table class="ui celled table">
    <thead>
      <tr>
        <th><?php echo __('CIRCULO DE MEJORA CONTINUA'); ?></th>
        <th><?php echo __('EST.'); ?></th>
        <th><?php echo __('PRODUCTO'); ?></th>
        <th><?php echo __('RESPONSABLE'); ?></th>
        <th><?php echo __('OBSERVACION'); ?></th>
      </tr>
    </thead>
    <tbody id="cuerpo1">      
    </tbody>
      <?php foreach ($extemporaneos as $key => $observacion): ?>
      <tr>      
        <td><?php echo $observacion['Cmc']['descripcion'];?></td>
        <td><?php echo $observacion['Estandare']['id'];?></td>       
        <td><?php echo $observacion['Fdesagregada']['descripcion'];?></td>
        <td><?php echo $observacion['Persona']['firstname'].' '.$observacion['Persona']['appaterno'].' '.$observacion['Persona']['apmaterno'];?></td>
        <td><?php echo $observacion['Historiale']['observacion'];?></td>
      </tr>
      <?php endforeach;?> 
    </table>

  </div>

    <a class='boton' href="javascript:window.print()"></a>

</div>
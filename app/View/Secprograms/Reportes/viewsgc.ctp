<?php
$avancetotal = 0;
foreach ($fuentes as $key => $fuente) {
  if(!empty($fuente['Fuente']['avance']))
      $avancetotal = $avancetotal + $fuente['Fuente']['avance'];
}

$avancepro = 0;
foreach ($procedimientos as $key => $procedimiento) {
  $avance = 0;
  $count = 0;
  foreach ($fuentes as $key1 => $fuente) {
    if($procedimiento['Procedimiento']['id']==$fuente['Fuente']['procedimiento_id']){
      $avance = $avance + $fuente['Fuente']['avance'];
      $count =  $count+ 1;
    }
  }
  $avance = $avance/$count;
  $procedimientos[$key]['Procedimiento']['avance'] = $avance;
}  
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">	

      google.charts.load('current', {'packages':['corechart']});

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawProcedimientos);
      google.charts.setOnLoadCallback(drawDirectriz);

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawAvance);



      function drawAvance() {

        var data = google.visualization.arrayToDataTable([
          ['Descripcion', '% de Avance'],
          ['Avanzado',<?php echo ($avancetotal/218);?>],

          ["Sin Avance",<?php echo (100-$avancetotal/218);?>],

        ]);

        var options = {
          title: 'GRÁFICA GLOBAL DEL AVANCE DEL SISTEMA DE GESTION DE CALIDAD EN LA UNHEVAL - MODELO AUDI'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

      function drawProcedimientos() {
        var data = new google.visualization.arrayToDataTable([

          ['Carrera', 'Avance'],
          <?php  foreach ($procedimientos as $key => $procedimiento):?>
          ['<?php echo $procedimiento['Procedimiento']['descripcion'];?>', <?php echo !empty($procedimiento['Procedimiento']['avance'])?round($procedimiento['Procedimiento']['avance'],2):0;?>],
          <?php endforeach; ?>
          ['Porcentaje Total',100],
                     
          
        ]);


        var options = {
        title: '% de Avance por Procedimientos',
        isStacked: true,
        height:600,
        chartArea: {
          height:300,
          top:100,
        },
        hAxis: {
          title: 'Procedimientos',
          titleTextStyle: {
            color: '#FF0000',            
          },
          
          slantedText:true,
          slantedTextAngle:45,
          
        },
        vAxis: {
          title: 'Porcentaje'
        }
      };

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }]);

      var chart = new google.visualization.ColumnChart(document.getElementById('carreras'));
      chart.draw(view, options);
    };

    function drawDirectriz() {
        var data = new google.visualization.arrayToDataTable([

          ['Directriz', 'Avance'],
          <?php  foreach ($directrices as $key => $directriz):?>
          ['<?php echo $directriz['Directrice']['descripcion'];?>', <?php echo round($directriz['Directrice']['avance']/$directriz['Directrice']['count'], 2);?>],
          <?php endforeach; ?>
          ['Porcentaje Total',100],
                     
          
        ]);


        var options = {
        title: '% de Avance por Directrices',
        isStacked: true,
        height:600,
        chartArea: {
          height:300,
          top:100,
        },
        hAxis: {
          title: 'Directrices',
          titleTextStyle: {
            color: '#FF0000',            
          },
          
          slantedText:true,
          slantedTextAngle:45,
          
        },
        vAxis: {
          title: 'Porcentaje'
        }
      };

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }]);

      var chart = new google.visualization.ColumnChart(document.getElementById('dual_y_div'));
      chart.draw(view, options);
    };

</script>
<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">
<div class="card-panel">
    <h3 class="header2"><?php echo __('% DE AVANCE DEL SISTEMA DE GESION DE CALDIAD - MODELO AUDIT');?></h3>
<div class="row">

    <div id="piechart" style="width: 100%; height: 500px;"></div>

    <h4 class="header2"><?php echo __('PROCEDIMIENTOS');?></h4>

    <div id="carreras" style="width: 100%; min-height: 400px;"></div>

    <h4 class="header2"><?php echo __('DIRECTRICES');?></h4>

    <div id="dual_y_div" style="width: 100%; min-height: 400px;"></div>

</div>
</div>
</div>
</div>
<?php
$avancetotal = 0;
foreach ($escuelas as $key => $escuela) {
  $avance = 0;
  foreach ($estandares as $key1 => $estandar) {
    if($estandar['Estsecproject']['secproject_id']==$escuela['Secproject']['id']){
      $avance = $avance + $estandar['Estsecproject']['avanceevaluador'];
    }
  }
  $avance = $avance/34;
	$escuelas[$key]['Secproject']['avance'] = $avance;
  $avancetotal =  $avancetotal + $escuelas[$key]['Secproject']['avance'];
}  

foreach ($estandars as $key => $est) {
  $avance = 0;
  foreach ($estandares as $key1 => $estandar) {
    if($estandar['Estsecproject']['estandar_id']==$est['Estandare']['id']){
      $avance = $avance + $estandar['Estsecproject']['avanceevaluador'];
    }
  }
  $avance = $avance/27;
  $estandars[$key]['Estandare']['avance'] = $avance;
}

foreach ($factors as $key => $fac) {
  $avance = 0;
  foreach ($factores as $key1 => $factor) {
    if($factor['Facsecproject']['factor_id']==$fac['Factore']['id']){
      $avance = $avance + $factor['Facsecproject']['avanceevaluador'];
    }
  }
  $avance = $avance/27;
  $factors[$key]['Factore']['avance'] = $avance;
}

foreach ($dimensions as $key => $dim) {
  $avance = 0;
  foreach ($dimensiones as $key1 => $dimension) {
    if($dimension['Dimsecproject']['dimension_id']==$dim['Dimensione']['id']){
      $avance = $avance + $dimension['Dimsecproject']['avanceevaluador'];
    }
  }
  $avance = $avance/27;
  $dimensions[$key]['Dimensione']['avance'] = $avance;
}
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">	

      google.charts.load('current', {'packages':['corechart']});

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);
      google.charts.setOnLoadCallback(drawFactor);
      google.charts.setOnLoadCallback(drawDimension);
      google.charts.setOnLoadCallback(drawCarreras);

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawAvance);

      /*google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawCarreras);*/



      function drawAvance() {

        var data = google.visualization.arrayToDataTable([
          ['Descripcion', '% de Avance'],
          ['Finalizado',<?php echo ($avancetotal/27);?>],

          ["Sin Avance",<?php echo (100-$avancetotal/27);?>],

        ]);

        var options = {
          title: 'GRÁFICA GLOBAL DE LA UNHEVAL'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

      function drawCarreras() {
        var data = new google.visualization.arrayToDataTable([

          ['Carrera', 'Avance'],
          <?php  foreach ($escuelas as $key => $escuela):?>
          ['<?php echo substr($escuela['Secproject']['name'], 23);?>', <?php echo !empty($escuela['Secproject']['avance'])?round($escuela['Secproject']['avance'],2):0;?>],
          <?php endforeach; ?>
          ['Porcentaje Total',100],
                     
          
        ]);


        var options = {
        title: '% de Avance por Carreras Profesionales',
        isStacked: true,
        height:600,
        chartArea: {
          height:300,
          top:100,
        },
        hAxis: {
          title: 'Carreras Profesionales',
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

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([

          ['Estandar', 'Avance'],
          <?php  foreach ($estandars as $key => $estandar):?>
          ['<?php echo $estandar['Estandare']['titulo'];?>', <?php echo round($estandar['Estandare']['avance'], 2);?>],
          <?php endforeach; ?>
          ['Porcentaje Total',100],
                     
          
        ]);

        var options = {
          chart: {
            title: 'Estandares',
            subtitle: 'Avance total por estandar.'
          },
          bar:{ groupWidth:'95%'},
          vAxis: {
            minValue: 0,
            maxValue: 100,
            format: '#\'%\''
          },
          columns:[0,1,2]

        };

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: getValueAt.bind(undefined, 1),
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }]);

      var chart = new google.visualization.ColumnChart(document.getElementById('dual_y_div'));
      chart.draw(view, options);
    };

      function drawFactor() {
        var data = new google.visualization.arrayToDataTable([

          ['Factor', 'Avance'],
          <?php  foreach ($factors as $key => $factor):?>
          ['<?php echo $factor['Factore']['descripcion'];?>', <?php echo round($factor['Factore']['avance'], 2);?>],
          <?php endforeach; ?>
          ['Porcentaje Total',100],
                     
          
        ]);

        var options = {
          chart: {
            title: 'Factor',
            subtitle: 'Avance total por factor.'
          },
          bar:{ groupWidth:'95%'},
          legend: { position: "none" },
        };

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: getValueAt.bind(undefined, 1),
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }]);

      var chart = new google.visualization.ColumnChart(document.getElementById('divfactor'));
      chart.draw(view, options);
    };

    function getValueAt(column, dataTable, row) {
        return dataTable.getFormattedValue(row, column);
      }

      function drawDimension() {
        var data = new google.visualization.arrayToDataTable([

          ['Dimension', 'Avance'],
          <?php  foreach ($dimensions as $key => $dimension):?>
          ['<?php echo $dimension['Dimensione']['descripcion'];?>', <?php echo round($dimension['Dimensione']['avance'], 2);?>],
          <?php endforeach; ?>
          ['Porcentaje Total',100],
                     
          
        ]);

        var options = {
          chart: {
            title: 'Dimensión',
            subtitle: 'Avance total por dimension.'
          },
          bar:{ groupWidth:'95%'},
          vAxis: {
            minValue: 0,
            maxValue: 100,
            format: '#\'%\''
          },
          columns:[0,1,2]

        };

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: getValueAt.bind(undefined, 1),
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }]);

      var chart = new google.visualization.ColumnChart(document.getElementById('divDimension'));
      chart.draw(view, options);
    };

</script>
<?php echo $this->Session->flash();?>
<div class="row">
<div class="col s12 m12 112">

  <div class="card-panel">
    <h3 class="header2"><?php echo __('AVANCE GLOBAL');?></h3>
  <div class="row">

    <div id="piechart" style="width: 100%; height: 500px;"></div>

    <h4 class="header2"><?php echo __('RANKING');?></h4>

    <div id="carreras" style="width: 100%; min-height: 400px;"></div>

    <!--<table class="ui celled striped table">
      <thead>
        <tr>
          <th>Número</th>
          <th>CARRERA</th>
          <th>AVANCE</th>
        </tr>
        </thead>
      <tbody>
        <?php foreach ($escuelas as $key => $escuela):?>
        <tr>
          <td><?php echo 'E'.$escuela['Secproject']['id'];?></td>
          <td><?php echo $escuela['Secproject']['name'];?></td>
          <td><?php echo $escuela['Secproject']['avance'].'%';?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
  </div>
</div>-->

</div>
    <div id="divDimension" style="width: 100%; min-height: 400px;"></div>
    <div id="divfactor" style="width: 100%; min-height: 400px;"></div>
    <div id="dual_y_div" style="width: 100%; min-height: 400px;"></div>
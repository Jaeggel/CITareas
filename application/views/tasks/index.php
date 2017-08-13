 
 	
 
 <div class="container" name="listaTareas">
      <div id="grafico" style="min-width: 400px; height: 400px; margin: 0 auto">

      </div>
      <hr size="2px" color="black" />
      <div class="form-group">
        <div class="col-xs-4">
          <button onclick = "location='tasks/create'" type="reset" style="background-color: #ffffFF; border-color: #ffffff; border:none" ><img src="<?php echo base_url("assets/img/add.png"); ?>" WIDTH=42 HEIGHT=42 BORDER=2 VSPACE=3 HSPACE=3 align=left/>Nueva Tarea
          </button>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-xs-4">
          <label class="checkbox-inline">
            <input type="checkbox" id="tfin"> Tareas Finalizadas
          </label>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-xs-1">Grupo:</label>
          <div class="col-xs-3">
            <select class="form-control" name="grupo" id="grupo">
                <option>Seleccionar Grupo...</option>
                <option>Laboral</option>
                <option>Academico </option>
                <option>Domestico</option>
                <option>Otros</option>
            </select>
          </div>
      </div>
  </div>
  <div class="container">
  <hr size="2px" color="black" />
  </div>
  
  <div id="cont-tabla"> 
  <table class="table">
    <thead style="color: #fff; background-color: #000;">
      <tr>
        <th>Fecha</th>
        <th>Nombre</th>
        <th>Prioridad</th>
        <th>Grupo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="contenido">  
    <?php foreach ($tasks as $tasks_item):?>
      
      <?php 

        $fecha_actual = strtotime(date("Y-m-d",time()));
        $fecha_entrada = strtotime($tasks_item['fecha_tarea']);
      ?>

        <tr  <?php if($fecha_actual > $fecha_entrada){
                echo 'class="danger"';
            }else{
                echo 'class="current"';}; ?>>


          <td><?php echo $tasks_item['fecha_tarea']; ?></td>
          <td data-toggle="tooltip" data-container="body" data-placement="bottom" title="<?php echo $tasks_item['detalle_tarea']; ?>"><?php echo $tasks_item['nombre_tarea']; ?></td>
          <td  data-toggle="tooltip" data-container="body" data-placement="bottom" title="<?php echo $tasks_item['prioridad']; ?>"><img class="img-responsive  prioridad" src="<?php echo base_url();?>assets/img/<?php echo $tasks_item['prioridad']; ?>.png" WIDTH=22 HEIGHT=22 alt="prioridad"></td>
          <td><?php echo $tasks_item['grupo']; ?></td>
          <td>
            <button  data-toggle="tooltip" data-container="body" data-placement="bottom" title="Finalizar Tarea" type="submit" style="background-color:  transparent; border:none" ><img src="<?php echo base_url("assets/img/baja.png"); ?>" WIDTH=22 HEIGHT=22 BORDER=2 align=center  onclick="finalizar('<?php echo $tasks_item['nombre_tarea'];?>')"/>  
            <button data-toggle="tooltip" data-container="body" data-placement="bottom" title="Eliminar Tarea" type="submit" style="background-color:  transparent; border:none" ><img src="<?php echo base_url("assets/img/el.png"); ?>" WIDTH=22 HEIGHT=22 BORDER=2 align=center onclick="eliminar('<?php echo $tasks_item['nombre_tarea'];?>')"/>
          </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
  </table>
  <hr size="2px" color="black" />

  <div class="container" id="btnExp" align="center">
   <button data-toggle="tooltip" data-container="body" data-placement="bottom" title="Exportar a PDF"  style=" font-size: 16pt; background-color: white;color: black;border: #2ABDC4;" class="btn" onclick="location='tasks/pdf'">
   <IMG src="<?php echo base_url("assets/img/pdf.png");?>" WIDTH=35 HEIGHT=35 BORDER=2 VSPACE=3 HSPACE=3>PDF</button>
   <button data-toggle="tooltip" data-container="body" data-placement="bottom" title="Exportar a Excel"  style=" font-size: 16pt;  background-color: white;color: black;border: #2ABDC4;" class="btn" onclick="location='tasks/excel'">
   <IMG src="<?php echo base_url("assets/img/excel.png"); ?>" WIDTH=35 HEIGHT=35 BORDER=2 VSPACE=3 HSPACE=3>Excel</button>
  </div>
</div>
  <hr size="2px" color="black" />


<script type="text/javascript">
var datos;
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();   
  $.ajax({
        dataType: 'json',
        url:   'tasks/data/',
        type:  'post',
        beforeSend: function () {
        },
        success:  function (data) {
          datos = data; 
          grafica();
        }
    }); 
});
function grafica()
{
  var options = {
              chart: {
                  renderTo: 'grafico',
                  type: 'column',
                  marginRight: 130,
                  marginBottom: 25
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -20
              },
                colors: ['#4CB5AE', 'black'],
              xAxis: {
                  categories: ['Academico','Domestico','Laboral','Otros']
              },
              yAxis: {
                  title: {
                      text: 'Tareas'
                  },
                  stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }
            },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+
                          this.x +': '+ this.y;
                  }
              },
              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'top',
                  x: -10,
                  y: 100,
                  borderWidth: 0
              },
              
              series: []
          }
          
          $.getJSON("data", function(json) {
            
            options.series[0] = json[0];
            options.series[1] = json[1];
            //options.series[2] = json[2];
            //options.series[2] = json[3];
            chart = new Highcharts.Chart(options);
          });
}

</script>


 




<?php echo validation_errors(); ?>

<?php echo form_open('tasks/create');?>

<form class="form-horizontal">
	<div class="container" id="wrapper">
 	
 		<ol class="breadcrumb">
        <li><a href="<?php echo site_url('/tasks') ?>">Lista de Tareas</a></li>
        	<li class="active">Nueva Tarea</li>
    	</ol>

      <div class="form-group">
          <label class="control-label col-xs-3">Fecha:</label>
          <div class="col-xs-9">
              <input type="date" class="form-control" name="fecha_tarea" required>
          </div>
      </div>
      <br></br>
      <div class="form-group">
          <label class="control-label col-xs-3">Nombre de Tarea:</label>
          <div class="col-xs-9">
              <input type="text" class="form-control" maxlength="50" name="nombre_tarea" placeholder="Nombre de Tarea" required>
          </div>
      </div>
      <br></br>
       <div class="form-group">
          <label class="control-label col-xs-3">Prioridad: </label>
          <div class="col-xs-3">
              <label class="radio-inline">
                  <input type="radio" name="prioridad" value="Alta"> Alta
              </label>
          </div>
          <div class="col-xs-3">
              <label class="radio-inline">
                  <input type="radio" name="prioridad" value="Media" checked="checked"> Media
              </label>
          </div>
          <div class="col-xs-3">
              <label class="radio-inline">
                  <input type="radio" name="prioridad" value="Baja"> Baja
              </label>
          </div>
      </div>
	    <br></br>
      <div class="form-group">
          <label class="control-label col-xs-3">Grupo:</label>
          <div class="col-xs-9">
              <select class="form-control" name="grupo">
                  <option>Seleccionar Grupo...</option>
                  <option>Laboral</option>
                  <option>Academico </option>
                  <option>Domestico</option>
                  <option>Otros</option>
              </select>
          </div>
      </div>
<br></br>
      <div class="form-group">
          <label class="control-label col-xs-3">Detalle:</label>
          <div class="col-xs-9">
              <textarea rows="3" class="form-control" maxlength="250" placeholder="Detalle de la Tarea" name="detalle_tarea" required></textarea>
          </div>
      </div>
<br></br><br>
      <div class="col-xs-offset-6">
        <input id ="ok" type="submit" class="btn btn-primary" value="Aceptar" style="background-color: #75C7C3" onclick="validarFormulario()">
        <input type="reset" class="btn btn-default" value="Cancelar" onclick="location.href='<?php echo site_url('tasks')?>'">
      </div>  
</div>
</form>

<script type="text/javascript">
function validarFormulario(){
var cmbSelector = document.getElementById('grupo').selectedIndex;
if(cmbSelector == null || cmbSelector == 0){
      alert('ERROR: Debe seleccionar una opcion del combo box');
    }
  }

</script>
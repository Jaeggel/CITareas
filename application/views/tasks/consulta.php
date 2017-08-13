<div id="wrapper">
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
</div>

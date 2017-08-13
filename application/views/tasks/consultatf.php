<div>
<?php foreach ($tasks as $tasks_item):?>
        <tr class="success">
          <td><?php echo $tasks_item['fecha_tarea']; ?></td>
          <td><?php echo $tasks_item['nombre_tarea']; ?></td>
          <td  data-toggle="tooltip" data-container="body" data-placement="bottom" title="<?php echo $tasks_item['prioridad']; ?>"><img class="img-responsive  prioridad" src="<?php echo base_url();?>assets/img/<?php echo $tasks_item['prioridad']; ?>.png" WIDTH=22 HEIGHT=22 alt="prioridad"></td>
          <td><?php echo $tasks_item['grupo']; ?></td>
        </tr>
    <?php endforeach; ?>
</div>
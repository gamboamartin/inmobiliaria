<?php use config\views; ?>
<?php /** @var stdClass $row  viene de registros del controler*/ ?>

<tr>

    <td><?php echo $row->wt_estado_id; ?></td>
    <td><?php echo $row->wt_estado_descripcion; ?></td>
    <td><?php echo $row->wt_estado_codigo; ?></td>
    <td><?php echo $row->wt_estado_descripcion_select; ?></td>
    <!-- Dynamic generated -->

    <!-- End dynamic generated -->

    <?php include (new views())->ruta_templates.'listas/action_row.php';?>
</tr>
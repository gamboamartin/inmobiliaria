<?php use config\views; ?>
<?php /** @var stdClass $row  viene de registros del controler*/ ?>

<?php
    //var_dump($row);
    //exit;
?>
<tr>
    <td><?php echo $row->wt_hogar_id; ?></td>
    <td><?php echo $row->wt_hogar_descripcion; ?></td>
    <td><?php echo $row->wt_hogar_codigo; ?></td>
    <!-- Dynamic generated -->
    <td><?php echo $row->wt_hogar_observaciones; ?></td>
    <td><?php echo $row->wt_hogar_url; ?></td>

    <!-- End dynamic generated -->

    <?php include (new views())->ruta_templates.'listas/action_row.php';?>
</tr>
<?php use config\views; ?>
<?php /** @var stdClass $row  viene de registros del controler*/ ?>

<tr>
    <td><?php echo $row->wt_hogar_id; ?></td>
    <td><?php echo $row->wt_hogar_descripcion; ?></td>
    <td><?php echo $row->wt_hogar_codigo; ?></td>
    <!-- Dynamic generated -->
    <td><?php echo $row->wt_hogar_observaciones; ?></td>
    <td><?php echo $row->wt_hogar_url; ?></td>
    <td><?php echo $row->wt_hogar_georeferencia; ?></td>
    <td><?php echo $row->wt_hogar_ubicacion; ?></td>
    <td><?php echo $row->wt_hogar_wt_proposito_id; ?></td>
    <td><?php echo $row->wt_hogar_wt_tipo_inmueble_id; ?></td>
    <td><?php echo $row->wt_hogar_terreno; ?></td>
    <td><?php echo $row->wt_hogar_construccion; ?></td>
    <td><?php echo $row->wt_hogar_niveles; ?></td>
    <td><?php echo $row->wt_hogar_banio; ?></td>
    <td><?php echo $row->wt_hogar_recamara; ?></td>
    <td><?php echo $row->wt_hogar_patio; ?></td>
    <td><?php echo $row->wt_hogar_estacionamiento; ?></td>


    <!-- End dynamic generated -->

    <?php include (new views())->ruta_templates.'listas/action_row.php';?>
</tr>
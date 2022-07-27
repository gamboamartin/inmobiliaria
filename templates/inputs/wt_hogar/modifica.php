<?php /** @var base\controller\controlador_base $controlador  viene de registros del controler/lista */ ?>

<?php
use config\generales;
use config\views;
?>
<div class="control-group col-sm-6">
    <label class="control-label" for="descripcion">Id</label>
    <div class="controls">
        <input type="text" name="descripcion" value="<?php echo $controlador->row_upd->id; ?>" class="form-control" required="" id="Id" placeholder="Descripcion" readonly>
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="descripcion">Descripcion</label>
    <div class="controls">
        <input type="text" name="descripcion" value="<?php echo $controlador->row_upd->descripcion; ?>" class="form-control" required="" id="descripcion" placeholder="Descripcion">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="codigo">Codigo</label>
    <div class="controls">
        <input type="text" name="codigo" value="<?php echo $controlador->row_upd->codigo; ?>" class="form-control" required="" id="codigo" placeholder="Codigo">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="observaciones">Observaciones</label>
    <div class="controls">
        <input type="text" name="observaciones" value="<?php echo $controlador->row_upd->observaciones; ?>" class="form-control" required="" id="observaciones" placeholder="Observaciones">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="url">Url</label>
    <div class="controls">
        <input type="text" name="url" value="<?php echo $controlador->row_upd->url; ?>" class="form-control" required="" id="Url" placeholder="Url">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="img_descripcion">Img Descripcion</label>
    <div class="controls">
        <input type="text" name="img_descripcion" value="<?php echo $controlador->row_upd->img_descripcion; ?>" class="form-control" required="" id="Url" placeholder="img_descripcion">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="georeferencia">Georeferencia</label>
    <div class="controls">
        <input type="text" name="georeferencia" value="<?php echo $controlador->row_upd->georeferencia; ?>" class="form-control" required="" id="georeferencia" placeholder="Georeferencia">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="wt_proposito">Proposito</label>
    <div class="controls">
        <?php echo $controlador->inputs->select->wt_proposito_id; ?>
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="wt_proposito">Tipo Inmueble</label>
    <div class="controls">
        <?php echo $controlador->inputs->select->wt_tipo_inmueble_id; ?>
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="terreno">Terreno</label>
    <div class="controls">
        <input type="text" name="terreno" value="<?php echo $controlador->row_upd->terreno; ?>" class="form-control" required="" id="terreno" placeholder="Terreno">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="construccion">Construccion</label>
    <div class="controls">
        <input type="text" name="construccion" value="<?php echo $controlador->row_upd->construccion; ?>" class="form-control" required="" id="construccion" placeholder="Construccion">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="niveles">Niveles</label>
    <div class="controls">
        <input type="text" name="niveles" value="<?php echo $controlador->row_upd->niveles; ?>" class="form-control" required="" id="niveles" placeholder="Niveles">
    </div>
</div>

<?php include (new views())->ruta_templates.'botons/submit/modifica_bd.php';?>
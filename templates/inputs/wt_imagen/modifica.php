<?php /** @var base\controller\controlador_base $controlador  viene de registros del controler/lista */ ?>
<?php use config\views;?>
<div class="control-group col-sm-6">
    <label class="control-label" for="descripcion">Id</label>
    <div class="controls">
        <input type="text" name="descripcion" value="<?php echo $controlador->row_upd->id ?>" class="form-control" required="" id="Id" placeholder="Descripcion" readonly>
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="descripcion">Descripcion</label>
    <div class="controls">
        <input type="text" name="descripcion" value="<?php echo $controlador->row_upd->descripcion ?>" class="form-control" required="" id="descripcion" placeholder="Descripcion">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="codigo">Codigo</label>
    <div class="controls">
        <input type="text" name="codigo" value="<?php echo $controlador->row_upd->codigo ?>" class="form-control" required="" id="codigo" placeholder="Codigo">
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="wt_proposito">Proposito</label>
    <div class="controls">
        <?php echo $controlador->inputs->select->doc_extension_id; ?>
    </div>
</div>
<?php include (new views())->ruta_templates.'botons/submit/modifica_bd.php';?>
<?php
namespace html;

use controllers\controlador_wt_hogar;
use gamboamartin\errores\errores;
use gamboamartin\system\html_controler;
use models\wt_hogar;
use PDO;

class wt_pos_venta_html extends html_controler {
    public function select_wt_pos_venta_id(int $cols, bool $con_registros,int $id_selected, PDO $link): array|string
    {
        $modelo = new wt_hogar($link);

        $select = $this->select_catalogo(cols:$cols, con_registros: $con_registros,id_selected:$id_selected, modelo: $modelo);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar select', data: $select);
        }
        return $select;
    }


}

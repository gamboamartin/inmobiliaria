<?php
namespace models;
use base\orm\modelo;
use gamboamartin\errores\errores;
use PDO;

class wt_pos_venta extends modelo{
    public function __construct(PDO $link){
        $tabla = __CLASS__;
        $columnas = array($tabla=>false, 'wt_tipo_inmueble'=>$tabla);
        $campos_obligatorios = array( 'wt_tipo_inmueble_id');

        $no_duplicados = array();


        parent::__construct(link: $link,tabla:  $tabla, campos_obligatorios: $campos_obligatorios,
            columnas: $columnas,no_duplicados: $no_duplicados);
    }

    public function obtener_registro_wt_hogar(string $landing_url): array{
        $wt_pos_venta_url_buscado['url'] = $landing_url;

        $r_wt_pos_venta = $this->filtro_and(filtro: $wt_pos_venta_url_buscado, tipo_filtro: 'textos');
        if(errores::$error){
            $error = (new errores())->error(mensaje: 'Error al obtener registro hogar con url busca',data:  $r_wt_pos_venta);
            print_r($error);
            die('Error');
        }

        $wt_pos_venta = array();
        if(isset($r_wt_pos_venta->registros_obj) && count($r_wt_pos_venta->registros_obj) > 0){
            $wt_pos_venta_id = $r_wt_pos_venta->registros_obj[0]->wt_pos_venta_id;
            if(errores::$error){
                $error = (new errores())->error(mensaje: 'Error al obtener id hogar',data:  $wt_pos_venta_id);
                print_r($error);
                die('Error');
            }

            $wt_pos_venta = $this->registro(registro_id: $wt_pos_venta_id);
            if(errores::$error){
                $error = (new errores())->error(mensaje: 'Error al obtener hogar',data:  $wt_pos_venta);
                print_r($error);
                die('Error');
            }
        }
        return $wt_pos_venta;
    }

}
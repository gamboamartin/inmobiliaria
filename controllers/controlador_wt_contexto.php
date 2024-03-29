<?php
/**
 * @author Martin Gamboa Vazquez
 * @version 1.0.0
 * @created 2022-05-14
 * @final En proceso
 *
 */
namespace controllers;

use gamboamartin\errores\errores;
use gamboamartin\system\links_menu;
use gamboamartin\system\system;
use gamboamartin\template\html;
use html\wt_context_img_html;
use html\wt_contexto_html;
use models\wt_contexto;
use PDO;
use stdClass;

class controlador_wt_contexto extends system {

    public function __construct(PDO $link, stdClass $paths_conf = new stdClass()){
        $modelo = new wt_contexto(link: $link);
        $html_base = new html();
        $html = new wt_contexto_html(html: $html_base);
        $obj_link = new links_menu(link: $link, registro_id: $this->registro_id);
        $this->rows_lista[] = 'wt_context_img_id';
        parent::__construct(html:$html, link: $link,modelo:  $modelo, obj_link: $obj_link, paths_conf: $paths_conf);

        $this->titulo_lista = 'Contexto';

    }


    public function alta(bool $header, bool $ws = false): array|string
    {
        $r_alta = parent::alta(header: false, ws: false); // TODO: Change the autogenerated stub
        if (errores::$error) {
            return $this->retorno_error(mensaje: 'Error al generar template', data: $r_alta, header: $header, ws: $ws);
        }

        $select = (new wt_context_img_html(html: $this->html_base))->select_wt_context_img_id(cols:12,con_registros: true,
            id_selected: -1, link: $this->link);
        if (errores::$error) {
            $error = $this->errores->error(mensaje: 'Error al generar select', data: $select);
            print_r($error);
            die('Error');
        }

        $this->inputs->select = new stdClass();
        $this->inputs->select->wt_context_img_id = $select;

        return $r_alta;

    }

    public function modifica(bool $header, bool $ws = false, string $breadcrumbs = '', bool $aplica_form = true,
                             bool $muestra_btn = true): array|stdClass
    {
        $r_modifica =  parent::modifica($header, $ws, $breadcrumbs, $aplica_form, $muestra_btn); // TODO: Change the autogenerated stub
        if(errores::$error){
            return $this->retorno_error(mensaje: 'Error al generar template',data:  $r_modifica, header: $header,ws:$ws);
        }


        $select = (new wt_context_img_html(html: $this->html_base))->select_wt_context_img_id(cols:12,con_registros:true,
            id_selected:$this->row_upd->wt_context_img_id, link: $this->link);
        if(errores::$error){
            $error = $this->errores->error(mensaje: 'Error al generar select',data:  $select);
            print_r($error);
            die('Error');
        }

        $this->inputs->select = new stdClass();
        $this->inputs->select->wt_context_img_id = $select;


        return $r_modifica;
    }
}

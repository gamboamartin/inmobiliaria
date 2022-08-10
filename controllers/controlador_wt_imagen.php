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
use html\doc_extension_html;
use html\wt_context_img_html;
use html\wt_hogar_html;
use html\wt_imagen_html;
use models\doc_documento;
use models\wt_imagen;
use PDO;
use stdClass;

class controlador_wt_imagen extends system {

    public function __construct(PDO $link, stdClass $paths_conf = new stdClass()){
        $modelo = new wt_imagen(link: $link);
        $html_base = new html();
        $html = new wt_imagen_html(html: $html_base);
        $obj_link = new links_menu($this->registro_id);
        $this->rows_lista[] = 'doc_extension_id';
        $this->rows_lista[] = 'wt_hogar_id';
        $this->rows_lista[] = 'wt_context_img_id';
        $this->rows_lista[] = 'doc_documento_id';

        parent::__construct(html:$html, link: $link,modelo:  $modelo, obj_link: $obj_link, paths_conf: $paths_conf);

        $this->titulo_lista = 'Imagen';

    }

    public function alta_bd(bool $header, bool $ws = false): array|stdClass
    {
        $documento_ins['status'] = 'activo';
        $documento_ins['doc_tipo_documento_id'] = 1;
        $r_documento = (new doc_documento($this->link))->alta_registro(registro: $documento_ins,file: $_FILES['imagen']);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al guardar documentos', data: $r_documento);
        }
        $_POST['doc_documento_id'] = $r_documento->registro_id;
        $_POST['doc_extension_id'] = $r_documento->registro['doc_extension_id'];

        return parent::alta_bd($header, $ws); // TODO: Change the autogenerated stub;

    }

    public function alta(bool $header, bool $ws = false): array|string
    {
        $r_alta = parent::alta(header: false, ws: false); // TODO: Change the autogenerated stub
        if (errores::$error) {
            return $this->retorno_error(mensaje: 'Error al generar template', data: $r_alta, header: $header, ws: $ws);
        }

        $select = (new doc_extension_html(html: $this->html_base))->select_doc_extension_id(cols:12,con_registros: true,
            id_selected: -1, link: $this->link);
        if (errores::$error) {
            $error = $this->errores->error(mensaje: 'Error al generar select', data: $select);
            print_r($error);
            die('Error');
        }

        $this->inputs->select = new stdClass();
        $this->inputs->select->doc_extension_id = $select;

        $select = (new wt_hogar_html(html: $this->html_base))->select_wt_hogar_id(cols:12,con_registros: true,
            id_selected: -1, link: $this->link);
        if (errores::$error) {
            $error = $this->errores->error(mensaje: 'Error al generar select', data: $select);
            print_r($error);
            die('Error');
        }

        $this->inputs->select->wt_hogar_id = $select;

        $select = (new wt_context_img_html(html: $this->html_base))->select_wt_context_img_id(cols:12,con_registros: true,
            id_selected: -1, link: $this->link);
        if (errores::$error) {
            $error = $this->errores->error(mensaje: 'Error al generar select', data: $select);
            print_r($error);
            die('Error');
        }

        $this->inputs->select->wt_context_img_id = $select;

        return $r_alta;

    }

    public function modifica_bd(bool $header, bool $ws): array|stdClass
    {
        $documento_ins['doc_tipo_documento_id'] = 1;

        $wt_imagen = (new wt_imagen($this->link))->registro(registro_id: $this->registro_id);
        $documento_id = $wt_imagen['doc_documento_id'];


        $_files = array();
        $_files['name'] = $_FILES['imagen']['name'];
        $_files['tmp_name'] = $_FILES['imagen']['tmp_name'];

        $_FILES = $_files;

        $r_modifica_documento = (new doc_documento($this->link))->modifica_bd(registro: $documento_ins, id:  $documento_id);

        if(errores::$error){
            $this->retorno_error('Error al modificar documento', $r_modifica_documento, $header, $ws);
        }

        $r_documento = (new doc_documento($this->link))->registro(registro_id: $r_modifica_documento->registro_id);

        $_POST['doc_documento_id'] = $r_modifica_documento->registro_id;

        $_POST['doc_extension_id'] = $r_documento['doc_extension_id'];

        

        $modifica_bd = parent::modifica_bd(header: false,ws: false);
        if(errores::$error){
            $this->retorno_error('Error al modificar imagen', $modifica_bd, $header, $ws);
        }
        $this->header_out(result: $modifica_bd, header: $header,ws:  $ws);

        return $modifica_bd;
    }

    public function modifica(bool $header, bool $ws = false, string $breadcrumbs = '', bool $aplica_form = true,
                             bool $muestra_btn = true): array|string
    {
        $r_modifica =  parent::modifica($header, $ws, $breadcrumbs, $aplica_form, $muestra_btn); // TODO: Change the autogenerated stub
        if(errores::$error){
            return $this->retorno_error(mensaje: 'Error al generar template',data:  $r_modifica, header: $header,ws:$ws);
        }

        $select = (new doc_extension_html(html: $this->html_base))->select_doc_extension_id(cols:12,con_registros:true,
            id_selected:$this->row_upd->doc_extension_id, link: $this->link);
        if(errores::$error){
            $error = $this->errores->error(mensaje: 'Error al generar select',data:  $select);
            print_r($error);
            die('Error');
        }

        $this->inputs->select = new stdClass();
        $this->inputs->select->doc_extension_id = $select;

        $select = (new wt_hogar_html(html: $this->html_base))->select_wt_hogar_id(cols:12,con_registros:true,
            id_selected:$this->row_upd->wt_hogar_id, link: $this->link);
        if(errores::$error){
            $error = $this->errores->error(mensaje: 'Error al generar select',data:  $select);
            print_r($error);
            die('Error');
        }

        $this->inputs->select->wt_hogar_id = $select;

        $select = (new wt_context_img_html(html: $this->html_base))->select_wt_context_img_id(cols:12,con_registros:true,
            id_selected:$this->row_upd->wt_context_img_id, link: $this->link);
        if(errores::$error){
            $error = $this->errores->error(mensaje: 'Error al generar select',data:  $select);
            print_r($error);
            die('Error');
        }

        $this->inputs->select->wt_context_img_id = $select;


        return $r_modifica;
    }

    public function guarda_imagen(bool $header = true, bool $ws = false){

    }




}

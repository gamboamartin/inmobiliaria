<?php
/**
 * @author Martin Gamboa Vazquez
 * @version 1.0.0
 * @created 2022-05-14
 * @final En proceso
 *
 */
namespace controllers;

use gamboamartin\system\links_menu;
use gamboamartin\system\system;
use html\wt_hogar_html;
use models\wt_hogar;
use PDO;
use stdClass;

class controlador_wt_hogar extends system {

    public function __construct(PDO $link, stdClass $paths_conf = new stdClass()){
        $modelo = new wt_hogar(link: $link);
        $html = new wt_hogar_html();
        $obj_link = new links_menu($this->registro_id);
        parent::__construct(html:$html, link: $link,modelo:  $modelo, obj_link: $obj_link, paths_conf: $paths_conf);

        $this->titulo_lista = 'Hogares';

    }




}

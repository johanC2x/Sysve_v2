<?php

require_once ("secure_area.php");
include_once(str_replace("application", "httpful.phar", dirname(__DIR__)));

class saleDocument extends Secure_area {
      
    function __construct() {
        parent::__construct('saleDocument');
        //$this->load->library('sale_lib');
        //$this->load->model("document");
    }
    
    function index($id = null, $cotizacion_id = null) {
        
        $id = isset($_GET["id"]) && !empty($_GET["id"]) ? $_GET["id"] : false;
        if ($id) {
            $datos = array(
                'cotizacion_id' => $_GET["id"],
                'cotizacion_cod' => $_GET["cotizacion_id"],
                'estatus' => $_GET["estatus"]
            );
        }
        $this->load->view('sales/document', $datos);
    }
}
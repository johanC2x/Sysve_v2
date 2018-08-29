<?php
class autocompletado extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('autocompletado_model');
    }
 
public function autocomplete(){
 if (isset($_GET['term'])){
  $q = strtolower($_GET['term']);
  $valores = $this->autocompletado_model->getAutocomplete($q);

  echo json_encode($valores);

 } 
}
 
}
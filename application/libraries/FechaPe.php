<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FechaPe {

    private $dateTime;

    public function __construct() {
        $this->dateTime = new DateTime();
    }

    public function setFecha($fecha) {
        $this->dateTime = $fecha;
        return $this;
    }

    public function setFechaPgsql($fecha) {
        $this->dateTime = DateTime::createFromFormat('Y-m-d', $fecha);
        return $this;
    }

    public function setFechaPE($fecha) {
        $this->dateTime = DateTime::createFromFormat('d/m/Y', $fecha);
        if ($this->dateTime == false) {
            $CI = & get_instance();
            $CI->outputjson->writeException("Formato de fecha incorrecto (dd/mm/yyyy)");
        }
        return $this;
    }

    public function setFechaTS($fecha) {
        $this->dateTime = new DateTime("@$fecha");
        return $this;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function comparar($fecha) {//devuelve un objeto "interval"
        return $this->dateTime->diff($fecha);
    }

    public function getStringPE() {
        return $this->dateTime->format('d/m/Y');
    }

    public function getStringPgSql() {
        return $this->dateTime->format('Y-m-d');
    }

    public function getPeriodo() {
        return $this->dateTime->format('Ym');
    }

    public function getNameMonthSpanish() {
        $months=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'];
        return $months[(int)$this->dateTime->format('m')-1];
    }
    
    public function getDDMMSpanish(){
        return $this->dateTime->format("d")." DE ".$this->getNameMonthSpanish();
    }

}

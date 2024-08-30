<?php

class TurnoServicio {
    private $id; 
    private $fecha;
    private $hora;
    private $descripcion;
    private $patente;
    //private $dniCli;

    public function __construct($id, $fecha, $hora, $descripcion, $patente) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->descripcion = $descripcion;
        $this->patente = $patente;
       // $this->dniCli = $dniCli;
    }

    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPatente() {
        return $this->patente;
    }

    /*
    public function getDniCli() {
        return $this->dniCli;
    }
        */

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPatente($patente) {
        $this->patente = $patente;
    }

    /*
    public function setDniCli($dniCli) {
        $this->dniCli = $dniCli;
    }
        */
}


    
<?php 

class Pasajero{
    private $nombre;
    private $apellido;
    private $dni;
    private $numTelefono;

    function __construct($nombre,$apellido,$dni,$numTelefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->numTelefono = $numTelefono;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getApellido(){
        return $this->apellido;
    }

    function setApellido($apellido){
        $this->apellido = $apellido;
    }

    function getDni(){
        return $this->dni;
    }

    function setDni($dni){
        $this->dni = $dni;
    }

    function getNumTelefono(){
        return $this->numTelefono;
    }

    function setNumTelefono($numTelefono){
        $this->numTelefono = $numTelefono;
    }

    function __toString(){
        return "(".$this->nombre."\n".$this->apellido."\n".$this->dni."\n".$this->numTelefono.")\n";
    }
}

?>
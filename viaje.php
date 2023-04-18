<?php

class Viaje{
    private $codigo;
    private $destino;
    private $cupo;
    private $listaPasajeros = array();
    private $cantPasajeros = 0;
    private $responsable;

    function __construct($codigo,$destino,$cupo){
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cupo = $cupo;
    }

    function getCodigo(){
        return $this->codigo;
    }

    function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    function getDestino(){
        return $this->destino;
    }

    function setDestino($destino){
        $this->destino = $destino;
    }

    function getCupo(){
        return $this->cupo;
    }

    function setCupo($cupo){
        $this->cupo = $cupo;
    }

    function getListaPasajeros(){
        return $this->listaPasajeros;
    }

    function setListaPasajeros($lista){
        $this->listaPasajeros = $lista;
    }

    function getCantPasajeros(){
        return $this->cantPasajeros;
    }

    function setCantPasajeros($cantPasajero){
        $this->cantPasajeros = $cantPasajero;
    }

    function getResponsable(){
        return $this->responsable;
    }

    function setResponsable($responsable){
        $this->responsable = $responsable;
    }

    function __toString(){
        return "(".$this->codigo."\n".$this->destino."\n".$this->cupo.")\n";
    }

    /**
     * Esta función permite saber si un pasajero ya está cargado según su DNI
     * @param INT $dni
     * @return BOOLEAN
     */
    function existePasajero($dni){
        $existe = false;
        $i = 0;
        while (!$existe && $i < $this->cantPasajeros){
            if ($this->getListaPasajeros()[$i]->getDni()==$dni){
                $existe = true;
            }
            $i++;
        }
        return $existe;
    }

    function obtenerIndicePasajero($dni){
        $listaAux = $this->getListaPasajeros();
        $encontro = false;
        $i = 0;
        while (!$encontro && $i<$this->getCantPasajeros()){
            if ($listaAux[$i]->getDni()==$dni){
                $encontro = true;
            } else {
                $i++;
            }
        }
        return $i;
    }

    /**
     * Esta función permite agregar un pasajero a la lista de pasajeros siempre y cuando no se encuentre en la misma
     * @param Pasajero $persona
     * @return STRING
     */
    function agregarPasajero($persona){
        $listaAux = $this->getListaPasajeros();
        if ($this->cantPasajeros==0){
            $listaAux[] = $persona;
            $this->setListaPasajeros($listaAux);
            $this->setCantPasajeros($this->cantPasajeros+1);
            $mensaje = "Pasajero agregado con éxito.\n";
        } else {
            if (!$this->existePasajero($persona->getDni())){
                $listaAux[] = $persona;
                $this->setListaPasajeros($listaAux);
                $this->setCantPasajeros($this->cantPasajeros+1);
                $mensaje = "Pasajero agregado con éxito.\n";
            } else {
                $mensaje = "El pasajero ya está ingresado.\n";
            }
        }
        return $mensaje;
    }
    
    /**
     * Esta función modifica los datos de un pasajero seleccionandolo mediante el DNI
     * @param Pasajero $persona
     * @param INT $dniIndice
     * @return NULL
     */
    function modificarPasajero($persona,$dniIndice){
        $listaAux = $this->getListaPasajeros();
        $i = $this->obtenerIndicePasajero($dniIndice);
        $listaAux[$i] = $persona;
        $this->setListaPasajeros($listaAux);
    }

    function eliminarPasajero($dniIndice){
        $arrayAux = $this->getListaPasajeros();
        $i = $this->obtenerIndicePasajero($dniIndice);
        array_splice($arrayAux,$i, 1);
        $this->setListaPasajeros($arrayAux);
        echo "Pasajero Eliminado con éxito\n";
    }
}

?>
<?php
include_once "pasajero.php";
class PasajerosVIP extends pasajero{
    private $nroViajeroFrecuente;
    private $cantidadMilla;

    public function __construct($nombre, $apellido, $nroDni, $nroTel, $nroAsiento, $nroViajeroFrecuente, $cantidadMilla){
        parent::__construct($nombre, $apellido, $nroDni, $nroTel,$nroAsiento);
        $this->nroViajeroFrecuente=$nroViajeroFrecuente;
        $this->cantidadMilla=$cantidadMilla;
    }
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }
    public function getCantidadMilla(){
        return $this->cantidadMilla;
    }
    public function setNroViajeroFrecuente($nroViajeroFrecuente){
        $this->nroViajeroFrecuente=$nroViajeroFrecuente;
     }
     public function setCantidadMilla($cantidadMilla){
        $this->cantidadMilla=$cantidadMilla;
     }
    public function darPorcentajeIncremento()
        {
            
            $incremento=35;
            $milla= $this->getCantidadMilla();

            if($milla>300){
                $incremento+30;
            }
            return $incremento;
        }
        function __toString()
        {
            $nroViajeroFre=$this->getNroViajeroFrecuente();
            $cantidadMilla=$this->getCantidadMilla();
          
    
      
            $pasajero=" | Viajero Frecuente NRO: " .$nroViajeroFre. " |Millas acumuladas: ".$cantidadMilla."\n";
    
            return parent::__toString().$pasajero;
        }
    
    }

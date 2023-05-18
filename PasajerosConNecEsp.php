<?php
include_once "pasajero.php";
class PasajeroConNecEsp extends pasajero{
    private $requiereSilla;
    private $requiereAsistencia;
    private $requiereComidaEspecial;

    //En el metodo constructor heredamos los atributos padre
    public function __construct($nombre, $apellido, $nroDni, $nroTel, $nroAsiento, $requiereSilla, $requiereAsistencia, $requiereComidaEspecial){
        parent::__construct($nombre, $apellido, $nroDni, $nroTel, $nroAsiento);
        $this->requiereSilla=$requiereSilla;
        $this->requiereAsistencia=$requiereAsistencia;
        $this->requiereComidaEspecial=$requiereComidaEspecial;
    }
    public function getRequiereSilla(){
        return $this->requiereSilla;
    }  
    public function getRequiereAsistencia(){
        return $this->requiereAsistencia;
    }
    public function getRequiereComidaEspecial(){
        return $this->requiereComidaEspecial;
    }
    
    public function setRequiereSilla($requiereSilla){
         $this->requiereSilla=$requiereSilla;
    }  
    public function setRequiereAsistencia($requiereAsistencia){
        $this->requiereAsistencia=$requiereAsistencia;
    }
    public function setRequiereComidaEspecial($requiereComidaEspecial){
        $this->requiereComidaEspecial=$requiereComidaEspecial;
    }
            
    public function darPorcentajeIncremento()
        {

            $sillaRuedas= $this->getRequiereSilla();
            $asistenciaGrl=$this->getRequiereAsistencia();
            $comidaEspecial=$this->getRequiereComidaEspecial();
            $incremento=0;

            if ($sillaRuedas && $asistenciaGrl &&  $comidaEspecial) {
                $incremento= 30;
            } elseif ($sillaRuedas || $asistenciaGrl || $comidaEspecial) {
                $incremento= 15;
            }
        
            return $incremento;
        }
        function __toString()
    {
        $silla=$this->getRequiereSilla();
        $asistente=$this->getRequiereAsistencia();
        $comidaEsp=$this->getRequiereComidaEspecial();

        $pasajero=" | Requiere silla?: ".($silla? 'SI':'NO')." | Requiere Asitencia?: ".($asistente? 'SI':'NO')." | Comida Especial?: ".($comidaEsp? 'SI':'NO')."\n";

        return parent::__toString().$pasajero;
    }


   

}


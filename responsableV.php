<?php
class ResponsableV{
    ///////////////////////////     DENICION DE   ATRIBUTOS           ///////////////////
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;
    //////////////////////////      DEFINICION DE METODOS            //////////////////////
    ///Metodo Constructor
    public function __construct($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $this->nroEmpleado=$nroEmpleado;
        $this->nroLicencia=$nroLicencia;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }    
    
    public function getNroEmpleado(){
       return $this->nroEmpleado;
    }
    public function getNroLicencia(){
        return $this->nroLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    
    public function setNroEmpleado($nroEmpleado){
        $this->nroEmpleado=$nroEmpleado;
    }
    public function setNroLicencia($nroLicencia){
        $this->nroLicencia=$nroLicencia;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
        
        public function __toString()
        {
            return $this->getNombre()." ".$this->getApellido()." Empleado Nro: ".$this->getNroEmpleado()." Licencia: ".$this->getNroLicencia();
        }

}

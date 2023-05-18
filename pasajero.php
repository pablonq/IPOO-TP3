<?php
class pasajero{
    private $nombre;
    private $apellido;
    private $nroDni;
    private $nroTel;
    private $nroTicket;
    private $nroAsiento;

    
    public function __construct($nombre, $apellido, $nroDni, $nroTel,$nroAsiento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nroDni = $nroDni;
        $this->nroTel = $nroTel;
        $this->nroTicket=rand(1,20);
        $this->nroAsiento = $nroAsiento;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getNroDni()
    {
        return $this->nroDni;
    }
    public function getNroTel()
    {
        return $this->nroTel;
    }
    public function getNroTicket()
    {
        return $this->nroTicket;
    }
    public function getNroAsiento()
    {
        return $this->nroAsiento;
    }
    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function setNroDni($nroDni)
    {
        $this->nroDni = $nroDni;
    }
    public function setNroTel($nroTel)
    {
        $this->nroTel = $nroTel;
    }
    public function setNroTicket($nroTicket)
    {
        $this->nroTicket = $nroTicket;
    }
    public function setNroAsiento($nroAsiento)
    {
        $this->nroAsiento = $nroAsiento;
    }

    public function darPorcentajeIncremento()
    {
        return 10;
    }

    
    public function __toString()
    {
        $nombre=$this->getNombre();
        $apellido=$this->getApellido();
        $dni=$this->getNroDni();
        $tel=$this->getNroTel();
        $ticket=$this->getNroTicket();
        $asiento=$this->getNroAsiento();
        $pasajero=$nombre . " " . $apellido . " | DNI: " . $dni . " | Tel: " . $tel . " | NRO Ticked: VF12".$ticket." | Asiento: ".$asiento." \n";

        return $pasajero;
    }
}
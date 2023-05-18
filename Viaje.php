<?php
class Viaje
{
    
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros = [];
    private $responsable = [];
    private $valorPasaje;
    private $costoAbonado;


    
    public function __construct($codigo, $destino, $cantMaxPasajeros, $valorPasaje)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->responsable = [];
        $this->pasajeros = [];
        $this->valorPasaje = $valorPasaje;
        $this->costoAbonado = 0;
        
    }
    

    
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
    public function getCanMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }
    public function setCanMaxPasajeros($cantMaxPasajeros)
    {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }
    public function getPasajeros()
    {
        return $this->pasajeros;
    }
    public function setPasajeros($pasajero)
    {
        $this->pasajeros = $pasajero;
    }
    public function getResponsable()
    {
        return $this->responsable;
    }
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    public function getValorPasaje()
    {
        return $this->valorPasaje;
    }

    public function setValorPasaje($valorPasaje)
    {
        $this->valorPasaje = $valorPasaje;
    }

    public function getCostoAbonado()
    {
        return $this->costoAbonado;
    }

    public function setCostoAbonado($costoAbonado)
    {
        $this->costoAbonado = $costoAbonado;
    }



    

    public function comprobarPasajero($dni)
    {
        $respuesta = 0;
        $pasajero = array_search($dni, array_column($this->pasajeros, 'nroDni'));
        if ($pasajero || $pasajero === 0) {
            $respuesta = $this->getPasajeros()[$pasajero];
        }
        return $respuesta;
    }
    public function insertarPasajero($nombre, $apellido, $nroDni, $nroTel, $nroAsiento)
    {
        if ($this->comprobarPasajero($nroDni) == 0) {
            $longitud = count($this->getPasajeros());
            if ($longitud < $this->getCanMaxPasajeros()) {
                $pasajeroAIngresar = new Pasajero($nombre, $apellido, $nroDni, $nroTel, $nroAsiento);
                $arreglo = $this->getPasajeros();
                array_push($arreglo, $pasajeroAIngresar);
                $this->setPasajeros($arreglo);
            } else {
                return 2;
            }
            return true;
        }
    }

    public function insertarPasajeroVIP($nombre, $apellido, $nroDni, $nroTel, $nroAsiento, $nroViajeroFrecuente, $cantidadMilla)
    {
        if ($this->comprobarPasajero($nroDni) == 0) {
            $longitud = count($this->getPasajeros());

            if ($longitud < $this->getCanMaxPasajeros()) {
                $pasajeroAIngresarVIP = new PasajerosVIP($nombre, $apellido, $nroDni, $nroTel, $nroAsiento, $nroViajeroFrecuente, $cantidadMilla);

                $arreglo = $this->getPasajeros();
                array_push($arreglo, $pasajeroAIngresarVIP);
                $this->setPasajeros($arreglo);
            } else {
                return 2;
            }
            return true;
        }
    }
    public function insertarPasajeroEsp($nombre, $apellido, $nroDni, $nroTel, $nroAsiento, $silla, $asistencia, $comidaEspecial)
    {
        if ($this->comprobarPasajero($nroDni) == 0) {
            $longitud = count($this->getPasajeros());


            $requiereSilla = ($silla == "s") ? true : false;
            $requiereAsistencia = ($asistencia == "s") ? true : false;
            $requiereComidaEspecial = ($comidaEspecial == "s") ? true : false;

            if ($longitud < $this->getCanMaxPasajeros()) {
                $pasajeroAIngresarESP = new PasajeroConNecEsp($nombre, $apellido, $nroDni, $nroTel, $nroAsiento, $requiereSilla, $requiereAsistencia, $requiereComidaEspecial);
                $arreglo = $this->getPasajeros();
                array_push($arreglo, $pasajeroAIngresarESP);
                $this->setPasajeros($arreglo);
            } else {
                return 2;
            }
            return true;
        }
    }

    public function verPasajerosRegistrados()
    {

        $i = 0;
        $mensaje = "";
        foreach ($this->getPasajeros() as $pasajero) {
            $i++;
            $mensaje .= $i . " - " . $pasajero;
        }
        return $mensaje;
    }

    public function modificarPasajero($nroDni, $nombre, $apellido,  $nroTel)
    {

        $i = 0;
        $corte = false;
        $array_Pasajeros = $this->getPasajeros();
        $longitud = count($this->getPasajeros());

        while ($i < $longitud && !$corte) {
            if ($nroDni === $array_Pasajeros[$i]->getNroDni()) {

                $pasajeroEncontrado = $array_Pasajeros[$i];
                $pasajeroEncontrado->setNombre($nombre);
                $pasajeroEncontrado->setApellido($apellido);
                $pasajeroEncontrado->setNroDni($nroDni);
                $pasajeroEncontrado->setNroTel($nroTel);
                
                $corte = true;
            }
            $i++;
        }

        $this->setPasajeros($array_Pasajeros);
        return true;
    }

    public function eliminarPasajero($nroDni)
    {
        $i = 0;
        $corte = false;
        $array_Pasajeros = $this->getPasajeros();
        $longitud = count($this->getPasajeros());
        while ($i < $longitud && !$corte) {
            if ($nroDni === $array_Pasajeros[$i]->getNroDni()) {
                unset($array_Pasajeros[$i]);
                $array_Pasajeros = array_values($array_Pasajeros);
                $this->setPasajeros($array_Pasajeros);
                return true;
            }
            $i++;
        }
        return true;
    }
    
    


    public function insertarResponable($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $ingresarResponsable = new ResponsableV($nroEmpleado, $nroLicencia, $nombre, $apellido);
        $ingresarResponsable->setNroEmpleado($nroEmpleado);
        $ingresarResponsable->setNroLicencia($nroLicencia);
        $ingresarResponsable->setNombre($nombre);
        $ingresarResponsable->setApellido($apellido);
        $arreglo = $this->getResponsable();
        array_push($arreglo, $ingresarResponsable);
        $this->setResponsable($arreglo);

        return true;
    }


    public function verResponsableViaje()
    {
        $i = 0;
        $mensaje = "";
        foreach ($this->getResponsable() as $responsable) {
            $i++;
            $mensaje .= $responsable;
        }
        return $mensaje;
    }

    public function modificarResponsable($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $i = 0;
        $corte = false;
        $array_Responsable = $this->getResponsable();
        $longitud = count($this->getResponsable());

        while ($i < $longitud && !$corte) {
            if ($nroEmpleado === $array_Responsable[$i]->getNroEmpleado()) {

                $pasajeroEncontrado = $array_Responsable[$i];
                $pasajeroEncontrado->setNombre($nombre);
                $pasajeroEncontrado->setApellido($apellido);
                $pasajeroEncontrado->setNroLicencia($nroLicencia);
                $corte = true;
            }
            $i++;
        }

        $this->setResponsable($array_Responsable);
        return true;
    }

    public function eliminarResponsable($nroEmpleado)
    {
        $i = 0;
        $corte = false;
        $array_Responsable = $this->getResponsable();
        $longitud = count($this->getResponsable());
        while ($i < $longitud && !$corte) {
            if ($nroEmpleado === $array_Responsable[$i]->getNroEmpleado()) {
                unset($array_Responsable[$i]);
                $array_Responsable = array_values($array_Responsable);
                $this->setResponsable($array_Responsable);
                return true;
            }
            $i++;
        }
        return true;
    }


    
    public function hayPasajesDisponibles()
    {
        $listaPasajero = $this->getPasajeros();
        return count($listaPasajero) < $this->getCanMaxPasajeros();
    }
    
    public function calcularCostoPasajero($pasajero)
    {
        $costoPasaje = $this->getValorPasaje();
        $porcentaje = $pasajero->darPorcentajeIncremento();
        $calculoCosto = $costoPasaje+(($costoPasaje * $porcentaje) / 100);
        return $calculoCosto;
    }
    
    public function venderPasaje($pasajero)
    {
        $abonar = $this->calcularCostoPasajero($pasajero);
        $costoAbonar = $this->setCostoAbonado($this->getCostoAbonado() + $abonar);
     return $costoAbonar;
    }



    

    public function __toString()
    {
        $codigo = $this->getCodigo();
        $destino = $this->getDestino();
        $responsable = $this->getCanMaxPasajeros();
        $maxPasajeros = $this->getCanMaxPasajeros();
        $costoPasaje = $this->getValorPasaje();
        $abonado = $this->getCostoAbonado();
        $totalPasajeros = count($this->getPasajeros());

        print_r($this->getPasajeros());

        
        
        $mensaje = $codigo  . $responsable.$costoPasaje.$abonado.$maxPasajeros.$totalPasajeros;
        return $mensaje;
    }
}
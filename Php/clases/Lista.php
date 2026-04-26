<?php

require_once "Conexion.php";
require_once "Mascota.php";
class Lista
{

    private $array;

    public function __construct()
    {

    }

    public function Get_Array()
    {
        return $this->array;
    }

    public function Select_Mascotas()
    {
        $conexion = new Conexion();
        $resultados = $conexion->SetSelect("mascota", ["id_mascota","nombre","genero","edad","foto"]);
        return $resultados;
    }

    public function Select_Refugios(){
        $conexion = new Conexion();
        $resultados = $conexion->SetSelect("Refugio");
        $conexion->cerrarConexion();
        return $resultados;
    }
}

?>
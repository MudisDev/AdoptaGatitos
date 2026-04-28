<?php

require_once __DIR__ . '/Conexion.php';
require_once __DIR__ . '/Mascota.php';
class Lista
{

    private $lista;

    public function __construct()
    {

    }

    public function Get_Lista()
    {
        return $this->lista;
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
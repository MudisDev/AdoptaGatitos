<?php

require_once "Conexion.php";
require_once "Gato.php";
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

    public function Select_Gatos()
    {
        $conexion = new Conexion();
        $resultados = $conexion->SetSelect("Gato", ["id_gato","nombre","genero","edad","foto"]);
        return $resultados;
    }
}

?>
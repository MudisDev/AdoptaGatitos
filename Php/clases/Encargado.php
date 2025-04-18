<?php

require_once "Conexion.php";
class Encargado
{

    private $id_encargado;
    private $nombre;
    private $username;
    private $email;
    private $password;
    private $telefono;
    private $foto_perfil;
    private $fecha_ingreso;
    private $id_refugio;

    private $array_insert = ["nombre", "username", "email", "password", "telefono", "foto_perfil", "fecha_ingreso", "id_refugio"];
    private $funcion_fecha = "CURDATE()";

    public function __construct()
    {

    }

    public function Constructor_Registro(array $datos)
    {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function Constructor_Id($id_encargado){

        $this->id_encargado = $id_encargado;

    }

    public function Registrar_Encargado()
    {
        $conexion = new Conexion();
        $conexion->SetInsert("Encargado", $this->array_insert, [$this->nombre, $this->username, $this->email, $this->password, $this->telefono, $this->foto_perfil, $this->funcion_fecha, $this->id_refugio]);
        $conexion->cerrarConexion();
    }

    public function Get_Perfil_Encargado(){

    }
}

?>
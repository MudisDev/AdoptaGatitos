<?php
require_once 'Conexion.php';

class Ciudadano
{

    private $id_ciudadano;
    private $nombre;
    private $username;
    private $email;
    private $password;
    private $fecha_registro;
    private $telefono;
    private $genero;
    private $foto_perfil;

    private $array_insert = ["nombre", "username", "email", "password", "fecha_registro", "telefono", "genero", "foto_perfil"];
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

    public function Constructor_Id($id_ciudadano)
    {
        $this->id_ciudadano = $id_ciudadano;
    }

    public function Registrar_Ciudadano()
    {
        $conexion = new Conexion();
        $conexion->SetInsert(
            "Ciudadano",
            $this->array_insert,

            [
                $this->nombre,
                $this->username,
                $this->email,
                $this->password,
                $this->funcion_fecha,
                $this->telefono,
                $this->genero,
                $this->foto_perfil
            ]

        );
    }

    public function Get_Perfil_Ciudadano()
    {
        $array = [
            $this->id_ciudadano,
            $this->nombre,
            $this->username,
            $this->email,
            $this->password,
            $this->fecha_registro,
            $this->telefono,
            $this->genero,
            $this->foto_perfil
        ];
        return $array;
    }


    public function Borrar_Cuenta()
    {
        $conexion = new Conexion();
        $conexion->SetDelete("Ciudadano", "username = ", $this->id_ciudadano);
    }

}

?>
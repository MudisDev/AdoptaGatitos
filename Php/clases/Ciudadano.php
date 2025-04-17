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

    public function __construct(array $datos)
    {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;

            }
        }
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

}

?>
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

    public function Constructor(array $datos)
    {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
    public function Constructor_Iniciar_Sesion($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
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

    public function Iniciar_Sesion()
    {
        $conexion = new Conexion();
        $resultado_json = $conexion->IniciarSesion("Ciudadano", ["*"], "username", $this->username, $this->password);
        // Decodificar el JSON a un arreglo asociativo
        $resultado = json_decode($resultado_json, true);

        // Verificar si contiene el campo 'Error'
        if (isset($resultado['Error'])) {
            echo json_encode($resultado); // o maneja el error como gustes
        } else {
            // Si no hay error, llenar los datos del ciudadano
            $this->Constructor_Registro($resultado[0]);
        }
    }

}

?>
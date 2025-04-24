<?php
require_once 'Conexion.php';

class Ciudadano
{

    private $id_ciudadano = null;
    private $nombre = null;
    private $username = null;
    private $email = null;
    private $password = null;
    private $fecha_registro = null;
    private $telefono = null;
    private $genero = null;
    private $foto_perfil = null;

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

    public function SetDatos(array $datos)
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


    public function Borrar_Cuenta()
    {
        $conexion = new Conexion();
        $conexion->SetDelete("Ciudadano", "username = ", $this->username);
    }

    public function Iniciar_Sesion()
    {
        $conexion = new Conexion();
        $resultado = $conexion->IniciarSesion("Ciudadano", ["*"], "username", $this->username, $this->password);
        // Decodificar el JSON a un arreglo asociativo
        //$resultado = json_decode($resultado_json, true);

        // Verificar si contiene el campo 'Error'
        if (!isset($resultado['Error']))
            $this->SetDatos($resultado[0]);

        return $resultado; // o maneja el error como gustes
        //} else {
        // Si no hay error, llenar los datos del ciudadano
        //$this->SetDatos($resultado[0]);
        //}
    }

    public function Adoptar($tabla, $id_gato, $columna_actualizar, $condiciones)
    {
        $conexion = new Conexion();
        $conexion->SetActualizarRelacion($tabla, $id_gato, $this->id_ciudadano, $columna_actualizar, $condiciones);

    }

}

?>
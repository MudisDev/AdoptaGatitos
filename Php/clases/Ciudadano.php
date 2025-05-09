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

    private $array_insert = ["nombre", "username", "email", "password", /* "fecha_registro", */ "telefono", "genero", "foto_perfil"];
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

        $username_existe = $this->Username_Existe();
        if (!isset($username_existe['Error']))
            return ["Error" => "Username ya existe."];
        $email_existe = $this->Email_Existe();
        if (!isset($email_existe['Error']))
            return ["Error" => "Email ya existe."];
        $telefono_existe = $this->Telefono_Existe();
        if (!isset($telefono_existe['Error']))
            return ["Error" => "Telefono ya existe."];

        $conexion = new Conexion();
        $resultado = $conexion->SetInsert(
            "Ciudadano",
            $this->array_insert,
            [
                $this->nombre,
                $this->username,
                $this->email,
                $this->password,
                /* $this->funcion_fecha, */
                $this->telefono,
                $this->genero,
                $this->foto_perfil
            ]

        );

        return $resultado;

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

    /*     id_ciudadano INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(30) NOT NULL,
        username VARCHAR(30) NOT NULL UNIQUE,
        email VARCHAR(30) NOT NULL UNIQUE,
        password VARCHAR(200) NOT NULL,
        fecha_registro DATE NOT NULL,
        telefono VARCHAR(10),
        genero VARCHAR(20),
        foto_perfil VARCHAR(200) */


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

    public function Username_Existe()
    {
        $condiciones = "username = '$this->username'";
        $conexion = new Conexion();
        $resultado = $conexion->SetSelect("Ciudadano", ["*"], $condiciones);
        $conexion->cerrarConexion();

        return $resultado;
    }
    public function Email_Existe()
    {
        $condiciones = "email = '$this->email'";
        $conexion = new Conexion();
        $resultado = $conexion->SetSelect("Ciudadano", ["*"], $condiciones);
        $conexion->cerrarConexion();

        return $resultado;
    }
    public function Telefono_Existe()
    {
        $condiciones = "telefono = '$this->telefono'";
        $conexion = new Conexion();
        $resultado = $conexion->SetSelect("Ciudadano", ["*"], $condiciones);
        $conexion->cerrarConexion();

        return $resultado;
    }

}

?>
<?php
require_once 'Conexion.php';
require_once 'Gato.php';

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

        //$username_existe = $this->Username_Existe();
        if ($this->Username_Existe())
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
        $condiciones = "id_ciudadano = '$this->id_ciudadano'";
        $conexion = new Conexion();
        $resultado = $conexion->SetDelete("Ciudadano", $condiciones);
        return $resultado;
    }

    public function Iniciar_Sesion()
    {
        if (!$this->Username_Existe())
            return ["Error" => "Credenciales incorrectas."];
        $condiciones = "username = '$this->username'";
        $conexion = new Conexion();
        $resultado = $conexion->SetSelect("Ciudadano", ["*"], $condiciones, true, $this->password);

        // Verificar si contiene el campo 'Error'
        if (!isset($resultado['Error']))
            $this->SetDatos($resultado[0]);

        return $resultado;

    }

    public function Adoptar($id_gato)
    {
        $gato = new Gato(['id_gato' => $id_gato]);
        $resultado = $gato->Gato_Adoptado();
        if ($resultado)
            return ["Error" => "El gato ya ha sido adoptado"];

        $tabla = "Gato";
        $columas = "id_ciudadano = '$this->id_ciudadano', estado_adopcion = 'adoptado', fecha_adopcion = NOW() ";
        $condiciones = "id_gato = '$id_gato'";

        $conexion = new Conexion();
        $resultado = $conexion->SetUpdate($tabla, $columas, $condiciones);
        return $resultado;
    }

    public function Username_Existe()
    {
        $condiciones = "username = '$this->username'";
        $conexion = new Conexion();
        $resultado = $conexion->SetSelect("Ciudadano", ["*"], $condiciones);
        $conexion->cerrarConexion();
        if (isset($resultado['Error']))
            return false;
        return true;
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
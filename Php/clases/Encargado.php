<?php

use PhpParser\Node\Expr\FuncCall;

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
    private $array_insert_mascota = ["nombre", "genero", "foto", "fecha_ingreso", "descripcion", "estado", "edad", "color", "fecha_adopcion", "id_cartilla", "id_usuario", "id_personalidad", "id_raza", "id_refugio"];


    public function __construct(array $datos)
    {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function Registrar_Encargado()
    {
        $conexion = new Conexion();
        $resultado = $conexion->SetInsert("Encargado", $this->array_insert, [$this->nombre, $this->username, $this->email, $this->password, $this->telefono, $this->foto_perfil, $this->funcion_fecha, $this->id_refugio]);
        $conexion->cerrarConexion();
        return $resultado;
    }

    public function Get_Perfil_Encargado()
    {

    }

    public function Iniciar_Sesion()
    {
        $conexion = new Conexion();
        $resultado = $conexion->IniciarSesion("Encargado", ["*"], "username", $this->username, $this->password);
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

    public function SetDatos(array $datos)
    {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function RegistrarMascota(array $datos_mascota)
    {
        $conexion = new Conexion();
        $resultado = $conexion->SetInsert("mascota", $this->array_insert_mascota, $datos_mascota);
        return $resultado;
    }
}

?>
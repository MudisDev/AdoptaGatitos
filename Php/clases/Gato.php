<?php
require_once 'Conexion.php';
class Gato
{

    private $id_gato;
    private $nombre;
    private $genero;
    private $foto;
    private $fecha_ingreso;
    private $descripcion;
    private $estado;
    private $edad;
    private $color;
    private $fecha_adopcion;
    private $id_cartilla;
    private $id_ciudadano;
    private $id_personalidad;
    private $id_raza;
    private $id_refugio;

    private $array_insert = ["nombre", "genero", "foto", "fecha_ingreso", "descripcion", "estado", "edad", "color", "fecha_adopcion", "id_cartilla", "id_ciudadano", "id_personalidad", "id_raza", "id_refugio"];

    public function __construct()
    {
    }

    public function Constructor_ID($id_gato)
    {
        //echo "Entro al constructor ID";
        $this->id_gato = $id_gato;
    }
    public function Constructor_Registro(
        array $datos
        //$nombre, $genero, $foto, $fecha_ingreso, $descripcion, $estado, $edad, $color, $id_personalidad, $id_raza, $id_refugio
    ) {
        /* $this->nombre = $nombre;
        $this->genero = $genero;
        $this->foto = $foto;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->edad = $edad;
        $this->color = $color;
        $this->id_personalidad = $id_personalidad;
        $this->id_raza = $id_raza;
        $this->id_refugio = $id_refugio;  */

        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        $this->id_gato = null;
        $this->id_cartilla = null;
        $this->id_ciudadano = null;
        $this->fecha_adopcion = null;
    }

    public function Get_Perfil_Gato()
    {
        $array = [
            'id_gato' => $this->id_gato,
            'nombre' => $this->nombre,
            'genero' => $this->genero,
            'foto' => $this->foto,
            'fecha_ingreso' => $this->fecha_ingreso,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'edad' => $this->edad,
            'color' => $this->color,
            'fecha_adopcion' => $this->fecha_adopcion,
            'id_cartilla' => $this->id_cartilla,
            'id_ciudadano' => $this->id_ciudadano,
            'id_personalidad' => $this->id_personalidad,
            'id_raza' => $this->id_raza,
            'id_refugio' => $this->id_refugio
        ];
        return $array;
    }

    public function Registrar_Gato()
    {
        //echo "Entro a registrar_gato";
        $registro = new Conexion();
        $registro->SetInsert("Gato", $this->array_insert, [$this->nombre, $this->genero, $this->foto, $this->fecha_ingreso, $this->descripcion, $this->estado, $this->edad, $this->color, $this->fecha_adopcion, $this->id_cartilla, $this->id_ciudadano, $this->id_personalidad, $this->id_raza, $this->id_refugio]);
    }
    public function Buscar_Gato()
    {
        $buscar = new Conexion();
        $resultado = $buscar->SetSelect("Gato", ['*'], "id_gato = $this->id_gato");
        //echo "<br><br>RESULTADOS<br><br>";
        //echo json_encode($resultado);

        $datos = $resultado[0];

        $this->Constructor($datos);


    }
    public function Constructor(array $datos)
    {
        foreach ($datos as $key => $valor) {
            if (property_exists($this, $key)) {
                $this->$key = $valor;
            }
            //echo "key => $key, valor => $valor";
        }
    }

    public function Get_Id_Gato()
    {
        return $this->id_gato;
    }
    public function Get_Id_Nombre()
    {
        return $this->nombre;
    }
    public function Get_Id_Genero()
    {
        return $this->genero;
    }
    public function Get_Id_Foto()
    {
        return $this->foto;
    }
    public function Get_Fecha_Ingreso()
    {
        return $this->fecha_ingreso;
    }
    public function Get_Descripcion()
    {
        return $this->descripcion;
    }
    public function Get_Estado()
    {
        return $this->estado;
    }
    public function Get_Edad()
    {
        return $this->edad;
    }
    public function Get_Color()
    {
        return $this->color;
    }
    public function Get_Fecha_Adopcion()
    {
        return $this->fecha_adopcion;
    }
    public function Get_Id_Cartilla()
    {
        return $this->id_cartilla;
    }
    public function Get_Id_Ciudadano()
    {
        return $this->id_ciudadano;
    }
    public function Get_Personalidad()
    {
        return $this->id_personalidad;
    }
    public function Get_Raza()
    {
        return $this->id_raza;
    }
    public function Get_Refugio()
    {
        return $this->id_refugio;
    }
}



?>
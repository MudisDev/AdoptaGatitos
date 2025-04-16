<?php
require_once 'Conexion.php';

echo "gato script Bv2";
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

    public function __construct(
        $nombre,
        $genero,
        $foto,
        $fecha_ingreso,
        $descripcion,
        $estado,
        $edad,
        $color,
        $id_personalidad,
        $id_raza,
        $id_refugio,
        $id_gato = null,
        $fecha_adopcion = null,
        $id_cartilla = null,
        $id_ciudadano = null,
    ) {
        $this->id_gato = $id_gato;
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->foto = $foto;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->edad = $edad;
        $this->color = $color;
        $this->fecha_adopcion = $fecha_adopcion;
        $this->id_cartilla = $id_cartilla;
        $this->id_ciudadano = $id_ciudadano;
        $this->id_personalidad = $id_personalidad;
        $this->id_raza = $id_raza;
        $this->id_refugio = $id_refugio;
    }


    public function Perfil_Gato()
    {
        $array = [
            $this->id_gato,
            $this->nombre,
            $this->genero,
            $this->foto,
            $this->fecha_ingreso,
            $this->descripcion,
            $this->estado,
            $this->edad,
            $this->color,
            $this->fecha_adopcion,
            $this->id_cartilla,
            $this->id_ciudadano,
            $this->id_personalidad,
            $this->id_raza,
            $this->id_refugio
        ];
        print_r($array);
        echo json_encode($array);
    }

    public function Registrar_Gato()
    {
        echo "Entro a registrar_gato";
        $registro = new Conexion();
        $registro->SetInsert("Gato", $this->array_insert, [$this->nombre, $this->genero, $this->foto, $this->fecha_ingreso, $this->descripcion, $this->estado, $this->edad, $this->color, $this->fecha_adopcion, $this->id_cartilla, $this->id_ciudadano, $this->id_personalidad, $this->id_raza, $this->id_refugio]);
    }     
}



?>
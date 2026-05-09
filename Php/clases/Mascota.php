<?php
require_once 'Conexion.php';
class Mascota
{

    private $id_mascota = null;
    private $nombre = null;
    private $genero = null;
    private $foto = null;
    private $fecha_ingreso = null;
    private $descripcion = null;
    private $estado_adopcion = null;
    private $edad = null;
    private $color = null;
    private $fecha_adopcion = null;
    private $id_cartilla = null;
    private $id_usuario = null;
    private $id_personalidad = null;
    private $id_raza = null;
    private $id_refugio = null;

    public function __construct(array $datos)
    {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }



    public function Get_Perfil_Mascota()
    {
        $array = [
            'id_mascota' => $this->id_mascota,
            'nombre' => $this->nombre,
            'genero' => $this->genero,
            'foto' => $this->foto,
            'fecha_ingreso' => $this->fecha_ingreso,
            'descripcion' => $this->descripcion,
            'estado_adopcion' => $this->estado_adopcion,
            'edad' => $this->edad,
            'color' => $this->color,
            'fecha_adopcion' => $this->fecha_adopcion,
            'id_cartilla' => $this->id_cartilla,
            'id_usuario' => $this->id_usuario,
            'id_personalidad' => $this->id_personalidad,
            'id_raza' => $this->id_raza,
            'id_refugio' => $this->id_refugio
        ];
        return $array;
    }

    public function Buscar_Mascota()
    {
        $buscar = new Conexion();
        $resultado = $buscar->SetSelect("mascota", ['*'], "id_mascota = $this->id_mascota");
        //echo "<br><br>RESULTADOS<br><br>";
        //echo json_encode($resultado);

        $datos = $resultado[0];

        $this->Set_Datos($datos);


    }

    public function Mascota_Adoptada()
    {
        $condiciones = "id_mascota = '$this->id_mascota' AND estado_adopcion = 'adoptado'";
        $conexion = new Conexion;
        $resultado = $conexion->SetSelect("mascota", ["*"], $condiciones);
        if (isset($resultado["Error"]))
            return false;
        return true;

    }

    public function Set_Datos(array $datos)
    {
        foreach ($datos as $key => $valor) {
            if (property_exists($this, $key)) {
                $this->$key = $valor;
            }
            //echo "key => $key, valor => $valor";
        }
    }

    public function Get_Id_Mascota()
    {
        return $this->id_mascota;
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
    public function Get_Estado_Adopcion()
    {
        return $this->estado_adopcion;
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
    public function Get_Id_Usuario()
    {
        return $this->id_usuario;
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
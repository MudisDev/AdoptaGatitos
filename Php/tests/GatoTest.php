<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../clases/Gato.php';

class GatoTest extends TestCase
{
    public function testConstructorRegistroYPerfil()
    {
        $datos = [
            'nombre' => 'Michi',
            'genero' => 'Macho',
            'foto' => 'michi.jpg',
            'fecha_ingreso' => '2025-04-19',
            'descripcion' => 'Gatito travieso',
            'estado' => 'sin adoptar',
            'edad' => 2,
            'color' => 'naranja',
            'id_personalidad' => 1,
            'id_raza' => 2,
            'id_refugio' => 3
        ];

        $gato = new Gato();
        $gato->Constructor_Registro($datos);

        $perfil = $gato->Get_Perfil_Gato();

        $this->assertEquals('Michi', $perfil['nombre']);
        $this->assertEquals('naranja', $perfil['color']);
        $this->assertNull($perfil['id_ciudadano']); // porque así lo pone el constructor
        $this->assertEquals('sin adoptar', $perfil['estado']);

    }
}
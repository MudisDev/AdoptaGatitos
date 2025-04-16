<?php
class Conexion
{
    private $server;
    private $user;
    private $passwordb;
    private $bdname;
    private $conn; // Variable para almacenar la conexión

    private $sql;

    public function __construct(/* $server, $user, $passwordb, $bdname */)
    {
        $this->server = 'localhost';
        $this->user = 'u826668871_root2';
        $this->passwordb = 'Kazooie2518';
        $this->bdname = 'u826668871_adoptagatitos';

        // Intentar conexión a la BD
        $this->conn = new mysqli($this->server, $this->user, $this->passwordb, $this->bdname);



        // Verificar errores en la conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // Método para obtener información de conexión (solo con fines de prueba)
    public function getInfoConexion()
    {
        return "Conectado a la base de datos '{$this->bdname}' en el servidor '{$this->server}' con el usuario '{$this->user}'.";
    }

    // Método para cerrar la conexión
    public function cerrarConexion()
    {
        $this->conn->close();
        return "Conexión cerrada.";
    }

    public function getInfoBD()
    {

        $results = mysqli_query($this->conn, $this->sql);

        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                $datos[] = [
                    'id_gato' => $row['id_gato'],
                    'nombre' => $row['nombre'],
                ];

            }
            echo json_encode($datos);
        } else
            echo json_encode("Error, no hay gatos");

    }

    public function SetSQL(string $sql)
    {
        echo $sql;
        $this->sql = $sql;
    }

    public function SetSelect(string $tabla, array $columnas = ['*'], string $condiciones = '')
    {
        $cols = implode(", ", $columnas);
        $sql = "SELECT $cols FROM $tabla";

        if (!empty($condiciones)) {
            $sql .= " WHERE $condiciones";
        }

        $resultados = [];
        $resultado = $this->conn->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $resultados[] = $fila; // Cada fila es un diccionario (asociativo)
            }
        }
        echo json_encode($resultados);
        echo "<br>";
        echo "<br>";

        print_r($resultados);
        echo "<br>";
        echo "<br>";

        var_dump($resultados);
        return $resultados;
    }
}

$conexion1 = new Conexion();

// Mostrar información de conexión
echo $conexion1->getInfoConexion();

//$conexion2->SetSQL("SELECT * FROM Gato; ");
$conexion1->SetSelect("Ciudadano");
//$conexion1->getInfoBD();

// Cerrar conexión
echo "<br>" . $conexion1->cerrarConexion();

$conexion2 = new Conexion();

// Mostrar información de conexión
echo $conexion2->getInfoConexion();

//$conexion2->SetSQL("SELECT * FROM Gato; ");
$conexion2->SetSelect("Gato");
//$conexion2->getInfoBD();

// Cerrar conexión
echo "<br>" . $conexion2->cerrarConexion();

?>
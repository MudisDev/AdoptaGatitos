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

    public function SetSelect(string $tabla, array $columnas = ['*'], string $condiciones = '')
    {
        $cols = implode(", ", $columnas);
        $this->sql = "SELECT $cols FROM $tabla";

        if (!empty($condiciones)) {
            $this->sql .= " WHERE $condiciones";
        }

        $resultados = [];
        $resultado = $this->conn->query($this->sql);

        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $resultados[] = $fila; // Cada fila es un diccionario (asociativo)
            }
        }
        /* echo json_encode($resultados);
        echo "<br>";
        echo "<br>";

        print_r($resultados);
        echo "<br>";
        echo "<br>";

        var_dump($resultados); */
        return $resultados;
    }

    public function SetInsert(string $tabla, array $columnas, array $datos)
    {
        echo "Entro a set insert en conexion";

        $valores = [];
        foreach ($datos as $dato) {
            if ($dato === '' || is_null($dato)) {
                $valores[] = "NULL"; // sin comillas

            } elseif (strtoupper($dato) === 'CURDATE()') {
                $valores[] = "CURDATE()"; // sin comillas, es una función SQL
            } else {
                // Escapa y coloca comillas simples
                $dato_escapado = $this->conn->real_escape_string($dato);
                $valores[] = "'$dato_escapado'";
            }
        }

        echo "paso el foreach";


        $columnas = implode(", ", $columnas);
        $datos = implode(", ", $valores);



        echo "tabla -> ", $tabla;
        echo "<br>";
        echo json_encode($columnas);
        echo "<br>";
        echo json_encode($datos);
        echo "<br>";
        /* foreach ($datos as $value) {
            if ($value == '') {
                $value = null;
            } */
        # code...

        /* for ($i=0; $i < count($datos); $i++) { 
            # code...
        } */

        $this->sql = "INSERT INTO $tabla($columnas) VALUES($datos)";

        echo "SQL -> ", $this->sql;
        echo "<br>";
        $resultado = $this->conn->query($this->sql);
        if ($resultado) {
            echo "<br>";
            echo json_encode(["Success" => "Registro exitoso en tabla $tabla."]);
        } else {
            echo "<br>";
            echo json_encode(["Error" => "Resgistro fallido en tabla $tabla."]);
        }
    }
}

/* $conexion2 = new Conexion();

// Mostrar información de conexión
echo $conexion2->getInfoConexion();

//$conexion2->SetSQL("SELECT * FROM Gato; ");
$conexion2->SetSelect("Gato");
//$conexion2->getInfoBD();

// Cerrar conexión
echo "<br>" . $conexion2->cerrarConexion(); */

?>
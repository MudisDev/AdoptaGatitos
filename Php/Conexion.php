<?php
class Conexion
{
    private $server;
    private $user;
    private $passwordb;
    private $bdname;
    private $conn; // Variable para almacenar la conexión

    public function __construct($server, $user, $passwordb, $bdname)
    {
        $this->server = $server;
        $this->user = $user;
        $this->passwordb = $passwordb;
        $this->bdname = $bdname;

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
}

// Crear instancia de la clase
$conexion1 = new Conexion('localhost', 'u826668871_root2', 'Kazooie2518', 'u826668871_adoptagatitos');

// Mostrar información de conexión
echo $conexion1->getInfoConexion();

// Cerrar conexión
echo "<br>" . $conexion1->cerrarConexion();

?>

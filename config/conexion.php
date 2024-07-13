<?php
class Conexion
{
    private $user;
    private $password;
    private $host;
    private $port;
    private $dbname;

    function __construct()
    {
        $this->user = "root";
        $this->password = "";
        $this->host = "localhost";
        $this->port = 3306;
        $this->dbname = "nine2";
    }

    function getConnection()
    {
        try {
            $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname, $this->port);
            return $conn;
        } catch (Exception $e) {
            echo "Error: " . $e;
        }
    }
}

/*

Test de conexion
$con = new Conexion();
$con->getConnection();

*/

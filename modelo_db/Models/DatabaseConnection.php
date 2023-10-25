<?php

/* Clase para conexion a base de datos*/


class DatabaseConnection {
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "db_store";
    private $connect;

    public function __construct()
    {
        $this->connect = new mysqli($this->server, $this->user, $this->password, $this->db);

        if ($this->connect->connect_error) {
            die("Error al conectar con la base de datos" .  $this->connect->connect_error);
        }

        
        if($this->connect){
            echo "<script>
            console.log('Database Connected')
            </script>";
        }
    }

    public function connectDB(){
        return $this->connect;

    }

    public function closeConnection(){
        if($this->connect){
            $this->connect->close();
        }
    }

}
?>

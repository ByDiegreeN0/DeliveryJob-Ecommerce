<?php 

require_once("autoload.php");


class Admin extends DatabaseConnection {
    private $AdminUsername;
    private $AdminPassword;
    private $AdminEmail;
    private $Connect;

    public function __construct()
    {
        parent::__construct();
        $this->Connect = $this->connectDB();
    }

    public function ReadAdmin() {
        // Crear Script
    }
}
?>
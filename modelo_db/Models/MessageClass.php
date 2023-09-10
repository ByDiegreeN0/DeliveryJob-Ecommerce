<?php 

require_once("autoload.php");


class Message extends DatabaseConnection {

    private $MessageName;
    private $MessageAsunto;
    private $MessageEmail;
    private $MessageText;
    private $Connect;

    public function __construct()
    {
        parent::__construct();
        $this->Connect = $this->connectDB();
    }

    public function CreateMessage(){
        
    }
}

?>
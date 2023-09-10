<?php 
require_once("autoload.php");

class Notes extends DatabaseConnection {
  
    private $NoteTittle;
    private $NoteText;
    private $Connect;


    public function __construct()
    {
        parent::__construct();
        $this->Connect = $this->connectDB();
    }

    public function CreateNote(){

    }

    public function ReadNote(){

    }

    public function UpdateNote(){

    }

    public function DeleteNote(){
        
    }
}

?>
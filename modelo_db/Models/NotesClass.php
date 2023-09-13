<?php 
require_once("autoload.php");

class NotesClass extends DatabaseConnection {
  
    private $NoteTittle;
    private $NoteText;
    private $Connect;


    public function __construct()
    {
        parent::__construct();
        $this->Connect = $this->connectDB();
    }

    public function CreateNote($tittle, $text){
        $sql = "INSERT INTO tbl_notes (note_tittle, note_text) VALUES (?,?)";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){
            $prepare->bind_param("ss", $tittle, $text);

            if($prepare->execute()){

                $prepare->close();
                return true;

            }else {
                
                $prepare->close();
                return true;

            }

        }else {
            return false;
        }
    }


    public function ReadNote(){
        $sql = "SELECT * FROM tbl_notes";
        $row = $this->Connect->query($sql);

        if($row){
            $row->fetch_all(MYSQLI_ASSOC);
        }else {
            return false;
        }
    }


    public function UpdateNote($tittle, $text, $id){
        $sql = "UPDATE tbl_notes SET note_tittle = ?, note_text = ? WHERE note_id = ?";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){
            $prepare->bind_param("ssi", $tittle, $text, $id);

            if($prepare->execute()){

                $prepare->close();
                return true;
            }else {
                $prepare->close();
                return false;
            }
        } else {
            return false;
        }
    }


    public function DeleteNote($id){
        $sql = "DELETE FROM tbl_notes WHERE note_id = ?";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){
            $prepare->bind_param("i",$id);

            if($prepare->execute()){

                $prepare->close();
                return true;
            }else {

                $prepare->close();
                return false;
            }
        } else {
            return false;
        }
    }
}

?>
<?php 

require_once("autoload.php");


class MessageClass extends DatabaseConnection {

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

    public function CreateMessage($name, $asunto, $email, $text){
        $sql = "INSERT INTO tbl_message (message_name, message_asunto, message_email, message_m) values (?,?,?,?)";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){
            $prepare->bind_param("ssss", $name, $asunto, $email, $text);

            if($prepare->execute()){
                $prepare->close();
                return true;
            }else {
                $prepare->close();
                return false;
            }
        }
    }

    public function ReadMessage(){
        $sql = "SELECT * FROM tbl_message";
        $row = $this->Connect->query($sql);

        if($row){

            return $row->fetch_all(MYSQLI_ASSOC);
            
        }else {
            return false;
        }
    }

    public function DeleteMessage($id){
        $sql = "DELETE FROM tbl_message WHERE message_id = ?";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){
            $prepare->bind_param("i", $id);

            if($prepare->execute()){

                $prepare->close();
                return true;

            } else {

                $prepare->close();
                return true;
            }
        }
    }
}

?>
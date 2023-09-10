<?php 
require_once("autoload.php");


class Users extends DatabaseConnection {

    private $UserUsername;
    private $UserPassword;
    private $UserIdent;
    private $UserRealname;
    private $UserEmail;
    private $UserPhonenumber;
    private $UserAdress;
    private $Connect;



    public function __construct()
    {
        parent::__construct();
        $this->Connect = $this->connectDB();
    }

    public function CreateUser($username, $password, $ident, $realname, $email, $phonenumber, $addres){
       $sql = "INSERT INTO tbl_users (user_username, user_password, user_indet, user_realname, user_email, user_phonenumber, user_addres) VALUES (?,?,?,?,?,?,?,?)";
       $prepare = $this->Connect->prepare($sql);

       if($prepare){
        $prepare->bind_param("ssissss", $username, $password, $ident, $realname, $email, $phonenumber, $addres);

        if($prepare->execute()){

            $prepare->close();
            return true;
        }else{
            $prepare->close();
            return false;
        }
       }
    }

    public function GetUsers(){
        $sql = "SELECT * FROM tbl_users";
        $row = $this->Connect->query($sql);

        if($row){
            return $row->fetch_all(MYSQLI_ASSOC);
        }else{
            return false;
        }
    }

    public function UpdateUsers($username, $password, $ident, $realname, $email, $phonenumber, $addres, $id){
        $sql = "UPDATE tbl_users SET user_username = ?, user_password = ?, user_ident = ?, user_realname = ?, user_email = ?, user_phonenumber = ?, user_addres = ?, WHERE user_id = ?";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){
            $prepare->bind_param("ssissss", $username, $password, $ident, $realname, $email, $phonenumber, $addres, $id);

            if($prepare->execute()){

                $prepare->close();
                return true;
            }else {
                $prepare->close();
                return false;
            }
        }
    }

    public function DeleteUsers($id){
        $sql = "DELETE FROM tbl_users WHERE user_id = ?";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){

            $prepare->bind_param("i", $id);

            if($prepare->execute()){

                $prepare->close();
                return true;

            }else {
                
                $prepare->close();
                return false;

            }
        }
    }
}
?>
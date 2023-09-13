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
        $sql = "SELECT * FROM tbl_admin";
        $row = $this->Connect->query($sql);

        if($row){
            return $row->fetch_all(MYSQLI_ASSOC);
        }else {
            return false;
        }
        
    }

   

    private function CreateAdmin($Ausername, $Apassword, $Aemail){

        $sql = "INSERT INTO tbl_admin (admin_username, admin_password, admin_email) VALUES (?,?,?)";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){

            $prepare->bind_param("sss",$Ausername, $Apassword, $Aemail);

            if($prepare->execute()){

                $prepare->close();
                return true;
            }else {
                $prepare->close();
                return false;
            }
        }else {
            return false;
        }
    }

    private function UpdateAdmin($Ausername, $Apassword, $Aemail){

        $sql = "UPDATE tbl_admin SET admin_username = ?, admin_password = ?, admin_email = ?";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){

            $prepare->bind_param("sss",$Ausername, $Apassword, $Aemail);

            if($prepare->execute()){

                $prepare->close();
                return true;
            }else {
                $prepare->close();
                return false;
            }
        }else {
            return false;
        }
    }

    private function DeleteAdmin($Aid){
        $sql = "DELETE FROM tbl_admin WHERE admin_id = ?";

        $prepare = $this->Connect->prepare($sql);

        if($prepare){

            $prepare->bind_param("i",$Aid);

            if($prepare->execute()){

                $prepare->close();
                return true;
            }else {
                $prepare->close();
                return false;
            }
        }else {
            return false;
        }
    }
}


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
}
?>
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
}
?>
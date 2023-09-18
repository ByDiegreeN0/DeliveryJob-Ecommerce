<?php 

require_once("autoload.php");

class CartClass extends DatabaseConnection {

    private $CartId;
    private $UserId;
    private $ProdId;
    private $Connect;

    public function __construct()
    {
        parent::__construct();
        $this->Connect = $this->connectDB();
    }

    public function ReadCart(){

    }

    public function GetCartById($UserID){
        $sql = "SELECT * FROM tbl_users_cart WHERE user_id = ?";
        $row = $this->Connect->query($sql);

        if($row){
            return $row->fetch_all(MYSQLI_ASSOC);
        }else {
            return false;
        }
    }

    public function AddProductsToCart($ProdID, $UserID){
        $sql = "INSERT INTO tbl_users_cart (prod_id, user_id) values (?,?)";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){

            $prepare->bind_param("ii", $ProdID, $UserID);

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

    public function UpdateCart(){

    }

    public function DeleteCart(){

    }

    
}

?>
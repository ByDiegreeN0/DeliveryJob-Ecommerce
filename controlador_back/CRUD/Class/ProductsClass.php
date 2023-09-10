<?php 

require_once("autoload.php");

class Products extends DatabaseConnection {
    private $ProdIMG;
    private $ProdName;
    private $ProdDesc;
    private $ProdPrice;
    private $ProdStock;
    private $ProdEstado;
    private $Connect;

    public function __construct()
    {
       parent::__construct();
       $this->Connect = $this->connectDB();
    }


    public function CreateProducts($img, $name, $desc, $price, $stock, $estado) {
        $sql = "INSERT INTO tbl_products (prod_img, prod_name, prod_desc, prod_price, prod_stock, prod_estado) VALUES (?,?,?,?,?,?)";
        $prepare = $this->Connect->prepare($sql);
        $prepare->execute();

    }


    public function  GetProducts(){
        $sql = "SELECT * FROM tbl_products";
        $row = $this->Connect->query($sql);

        if($row){
            return $row->fetch_all(MYSQLI_ASSOC);
        }else {
            return false;
        }
    }


    public function UpdateProducts($id, $img, $name, $desc, $price, $stock, $estado){
        $sql = "UPDATE tbl_products SET prod_img = ?, prod_name = ?. prod_desc = ?, prod_price = ?, prod_stock = ?, prod_estado = ? WHERE prod_id = ?";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){
            $prepare->bind_param("sssiisi", $img, $name, $desc, $price, $stock ,$estado, $id);

            if($prepare->execute()){
                return true;
            }else {
                return false;
            }
            $prepare->close();
        }
        return false;
    }


    public function DeleteProducts($id){
        $sql = "DELETE FROM tbl_products WHERE prod_id = ?";
        $prepare = $this->Connect->prepare($sql);

        if($prepare){
            $prepare->bind_param("i", $id);

            if($prepare->execute()){
                return true;
            }else {
                return false;
            }
            $prepare->close();
        }
        return false;
    }



  
}

?>
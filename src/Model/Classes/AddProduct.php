<?php 

namespace Sonu\HeritageDairy\Model\Classes;

use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;
use Sonu\HeritageDairy\Model\AbstractClass\AddProd;
use \PDO;
use \PDOException;
/**
 * This class has functionalities to add new product.
 */
class AddProduct extends AddProd{

     /**
     * @access private
     * 
     * @var PDO|null
     */
    private ?PDO $conn=null;

    /**
     * @access private
     * 
     * @var string|null
     */
    private ?string $sql=null;

    //Destructor is called when there is no reference to its object
    function __destruct(){}

    /**
     * This function used to add new products.
     * 
     * @access public
     * 
     * @param string $prod_id
     * 
     * @param string $pname
     * 
     * @param string $pprice
     * 
     * @return void
     */
    public function addNewProduct(String $prod_id,String $pname,String $pprice) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();

        //try catch to handle sql exceptions
        try{
            $this->sql="Insert into products (prod_id,prod_name,prod_price) values (:prod_id,:prod_name,:prod_price)";

            $statement = $this->conn->prepare($this->sql);

            if($statement->execute([':prod_id' => $prod_id,':prod_name' => $pname,':prod_price' => $pprice])){
                echo "Product Added",PHP_EOL;
            }
            else{
                    echo "Product not added",PHP_EOL;
                }
        }
        catch(PDOException $e){
            echo "Error".$e;
        }
        finally{
            //closing statement
            if($statement)
                $statement=null;
            //closing the connection
            // if($conn)
            //     $conn->close();
            $GLOBALS['product']->productOption();
        }
    }

}
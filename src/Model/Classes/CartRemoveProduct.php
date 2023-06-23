<?php 

namespace Sonu\HeritageDairy\Model\Classes;

use Sonu\HeritageDairy\Model\Interfaces\CartRemoveProd;
use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;
use \PDO;
use \PDOException;

/**
 * This class has functionalities to remove products from cart.
 */
class CartRemoveProduct implements CartRemoveProd{
    
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
     * This function remove products to cart.
     * 
     * @access public
     * 
     * @param string $email,@param string $pid
     * 
     * @return void
     */
    public function removeProduct(String $email,String $pid) : void{
         //getting the connection
         $this->conn=DatabaseConnection::getConnection();
         //try catch to handle sql exception
         try{
            $this->sql="delete from cart where uemail=:email and prod_id=:prod_id";

            $statement = $this->conn->prepare($this->sql);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':prod_id',$pid,PDO::PARAM_STR);
            // execute the statement
            if ($statement->execute()) {
                echo "Product removed from cart",PHP_EOL;
            }
            else{
                echo "Product not removed from cart",PHP_EOL;
            }

         }
         catch(PDOException $e){
            echo "Error".$e;
         }
         finally{
            //closing the statement
            if($statement)
                $statement=null;
            //closing the connection
            // if($conn)
            //     $conn->close();
            $GLOBALS['home']->home();
         }
    }
    
}

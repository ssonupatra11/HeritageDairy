<?php 
/**
 * This class has functionalities to add products to cart.
 */
class CartAddProduct implements CartAddProd{
    
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
     * This function add products to cart.
     * 
     * @access public
     * 
     * @param string $email,@param string $pid
     * 
     * @return void
     */
    public function addProductsToCart(String $email,String $pid) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        //try catch to handle sql exception
        try{
            $this->sql="Insert into cart(uemail,prod_id) values(:email,:prod_id)";
            $statement = $this->conn->prepare($this->sql);

            if($statement->execute([':email' => $email,':prod_id' => $pid])){
                echo "Product added to cart",PHP_EOL;
            }
            else{
                    echo "Product not added to cart",PHP_EOL;
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

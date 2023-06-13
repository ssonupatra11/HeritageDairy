<?php 
/**
 * This class has functionalities to buy product.
 */
class BuyProduct implements BuyProd{

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
    private ?string $sql_query_1=null;

    /**
     * @access private
     * 
     * @var string|null
     */
    private ?string $sql_query_2=null;

    //Destructor is called when there is no reference to its object
    function __destruct(){}

    //function to buy product
    /**
     * This function used to buy product.
     * 
     * @access public
     * 
     * @param string $email,@param string $prod_id
     * 
     * @return void
     */
    public function buyProduct(String $email,String $prod_id) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        //try catch to handle sql exception
        try{
            $this->sql_query_1="delete from cart where uemail=:email and prod_id=:prod_id";
            $statement = $this->conn->prepare($this->sql_query_1);
            $statement->bindParam(':prod_id',$prod_id,PDO::PARAM_STR);
            $statement->bindParam(':email',$email,PDO::PARAM_STR);
            if($statement->execute()==true){
                echo "Product deleted from cart.",PHP_EOL;

                //from this inserting data into order table is done
                $this->sql_query_2="Insert into orders (user_email,prod_id,ord_date) values (:user_email,:prod_id,:ord_date)";

                $statement = $this->conn->prepare($this->sql_query_2);
                if($statement->execute([':user_email' => $email,':prod_id' => $prod_id,':ord_date'=>date("Y-m-d")])){
                    echo "Product bought.",PHP_EOL;
                }
                else{
                    echo "Product not available to buy.",PHP_EOL;
                    }
            }
            else{
                echo "Product not available in cart.",PHP_EOL;
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
            $GLOBALS['home']->home();
        }
    }
}
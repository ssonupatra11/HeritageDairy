<?php 

class CartFunctionality{
    
    /**
     * @var PDO/null
     */
    private ?PDO $conn=null;

    /**
     * @var string/null
     */
    private ?string $sql=null;

    //function to add products to cart
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

    //function to remove product from cart
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
     
    //function to view user cart
    public function viewUserCartHistory(String $email) : void{
         
        
        //getting the connection
         $this->conn=DatabaseConnection::getConnection();
         //try catch to handle sql exception
         try{
             $this->sql="select c.uemail,p.prod_id,p.prod_name,p.prod_price from cart c,products p where c.prod_id=p.prod_id";
             $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            $count=0;

            if ($rows) {
	            // show the rows
	            foreach ($rows as $row) {
                    if($row["uemail"]==$email){
                        echo "User Email : ".$row["uemail"]."\nProduct Id : ".$row["prod_id"]."\nProduct name : ".$row["prod_name"]."\nProduct Price : ".$row["prod_price"],PHP_EOL,PHP_EOL;
                        $count++;
                    }
        	    }
            }
            if($count==0){
                    echo "No records found",PHP_EOL;
                 }

         }
         catch(PDOException $e){
            echo "Error".$e;
         }
         finally{
            //closing the connection
            // if($conn)
            //     $conn->close();
            $GLOBALS['home']->home();
         }
    }

    
}

?>  
<?php 

class Order{

    /**
     * @var PDO/null
     */
    private ?PDO $conn=null;

    /**
     * @var string/null
     */
    private ?string $sql_query_1=null;

    /**
     * @var string/null
     */
    private ?string $sql_query_2=null;

    //function to view User order history
    public function viewUserOrderHistory(String $email) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        //try catch to handle sql exception
        try{
            $this->sql_query_1="select u.name,u.phone,o.user_email,o.prod_id,o.ord_date,p.prod_name,p.prod_price from user u inner join orders o on u.email=o.user_email inner join products p on o.prod_id=p.prod_id";
            $statement = $this->conn->query($this->sql_query_1);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            $count=0;
            if ($rows) {

	            // show the rows
	            foreach ($rows as $row) {
                    
                    //if condition match email and show data
                   if($row["user_email"]===$email){
                       echo "User name : ".$row["name"]."\nUser Phone : ".$row["phone"]."\nUser Email : ".$row["user_email"]."\nProduct id : ".$row["prod_id"]."\nOrder date : ".$row["ord_date"]."\nProduct name : ".$row["prod_name"]."\nProduct price : ".$row["prod_price"],PHP_EOL,PHP_EOL;
                       $count++;
                   }
        	    }
            }
            if($count===0){
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

    //function to buy product
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
?>
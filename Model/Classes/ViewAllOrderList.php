<?php 

/**
 * This class has a functionality to view all order history.
 */
 class ViewAllOrderList implements ViewData{
    
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
     * This function to fetch all users order records.
     * 
     * @access public
     * 
     * @return void
     */
    public function view() : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();

        //try catch to handle sql exception
        try{
            //sql statement
            $this->sql="select u.name,u.phone,u.email,o.prod_id,p.prod_name,p.prod_price,o.ord_date from user u inner join orders o on u.email=o.user_email inner join products p on o.prod_id=p.prod_id";
            
            $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
	            // show the rows
	            foreach ($rows as $row) {
                    echo "User name : ".$row["name"]."\nUser Phone : ".$row["phone"]."\nUser email : ".$row["email"]."\nProduct id : ".$row["prod_id"]."\nProduct name : ".$row["prod_name"]."\nProduct Price : ".$row["prod_price"]."\nOrder date : ".$row["ord_date"],PHP_EOL,PHP_EOL;
        	    }
            }
            else{
                echo "No users order record found.",PHP_EOL;
            }
        }
        catch(PDOException $e){
            echo "Error".$e;
        }
        finally{
            //closing theconnection
            // if($conn)
            //     $conn->close();
            $GLOBALS['product']->productOption();
        }
    }
}

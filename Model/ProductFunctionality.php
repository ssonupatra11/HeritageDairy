<?php 

class ProductFunctionality{

    /**
     * @var PDO/null
     */
    private ?PDO $conn=null;

    /**
     * @var string/null
     */
    private ?string $sql=null;

    //function to add new products
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

    //function to update product name
    public function updateProductName(String $prod_id,String $new_pname) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
    
        try{
            //sql statement
            $this->sql="update products set prod_name=:new_pname where prod_id=:prod_id";
            // prepare statement
            $statement = $this->conn->prepare($this->sql);

            // bind params
            $statement->bindParam(':prod_id', $prod_id, PDO::PARAM_STR);
            $statement->bindParam(':new_pname',$new_pname ,PDO::PARAM_STR);
            
            // execute the UPDATE statment
            if ($statement->execute()) {
	            echo "Product name updated",PHP_EOL;
            }
            else{
                echo "Product name not updated",PHP_EOL;
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
            $GLOBALS['product']->productOption();
        }
    }

    //function to update product price
    public function updateProductPrice(String $prod_id,String $new_pprice) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();

        try{
            //sql statement
            $this->sql="update products set prod_price=:new_price where prod_id=:prod_id";
            // prepare statement
            $statement = $this->conn->prepare($this->sql);

            // bind params
            $statement->bindParam(':prod_id', $prod_id, PDO::PARAM_STR);
            $statement->bindParam(':new_price',$new_pprice ,PDO::PARAM_STR);
            
            // execute the UPDATE statment
            if ($statement->execute()) {
	            echo "Product price updated",PHP_EOL;
            }
            else{
                echo "Product price not updated",PHP_EOL;
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
            $GLOBALS['product']->productOption();
        }
    }


    //function to fetch products data
    public function retriveProduct() :void {
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();

        try{
            echo "All products list!",PHP_EOL;
            //sql statement
            $this->sql="select * from products";

            $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
	            // show the rows
	            foreach ($rows as $row) {
                    echo "Product Id : ".$row["prod_id"].",\nProduct Name : ".$row["prod_name"].",\nProduct Price : ".$row["prod_price"],PHP_EOL,PHP_EOL;
        	    }
            }
            else{
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
        }

        //if condition to check whether session type is admin or not
        if(isset($_SESSION["type"]) && $_SESSION["type"]==="admin")
        {
            $GLOBALS['product']->productOption();
        }
        else{
            $GLOBALS['home']->home();
        }
    }

    //function to remove/delete product
    public function deleteProduct(String $prod_id) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();

        try{
            //sql statement
            $this->sql="delete from products where prod_id=:prod_id";
            $statement = $this->conn->prepare($this->sql);
            $statement->bindParam(':prod_id',$prod_id,PDO::PARAM_STR);
            // execute the statement
            if ($statement->execute()) {
                echo "Record deleted",PHP_EOL;
            }
            else{
                echo "Record not deleted",PHP_EOL;
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
            $GLOBALS['product']->productOption();
        }
        
    }
}
?>
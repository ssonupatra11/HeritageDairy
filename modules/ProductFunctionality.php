<?php 

include_once("../modules/DatabaseConnection.php");
include_once("../public/User.php");
include_once("../public/Products.php");
include_once("../public/Home.php");

class ProductFunctionality{

    //function to add new products
    function addNewProduct(String $prod_id,String $pname,String $pprice){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();

        //try catch to handle sql exceptions
        try{
            $sql="Insert into products (prod_id,name,price) values (?,?,?)";

            $stmt=$conn->prepare($sql);
            $stmt->bind_param("sss",$prod_id,$pname,$pprice);
            if($stmt->execute()===true){
                echo "\nProduct Added\n";
            }
            else{
                echo "\nProduct not added\n";
            }
        }
        catch(mysqli_sql_exception $e){
            throw new mysqli_sql_exception($sql,$e->getMessage(),$e->getCode());
        }
        finally{
            //closing statement
            $stmt->close();
            //closing the connection
            $conn->close();
            (new Products())->productOption();
        }
    }

    //function to update product name
    function updateProductName(String $prod_id,String $new_pname){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
    
        try{
            //sql statement
            $sql="update products set name=? where prod_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_uname, $prod_id);
            if($stmt->execute()===true){
                echo "\nProduct name updated\n";
            }
            else{
                echo "\nProduct name not updated\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
        }
        finally{
            //closing the statement
            $stmt->close();
            //closing the connection
            $conn->close();
            (new Products())->productOption();
        }
    }

    //function to update product price
    function updateProductPrice(String $prod_id,String $new_pprice){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();

        try{
            //sql statement
            $sql="update products set price=? where prod_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_pprice, $prod_id);
            if($stmt->execute()===true){
                echo "\nProduct price updated\n";
            }
            else{
                echo "\nProduct price not updated\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
        }
        finally{
            //closing the statement
            $stmt->close();
            //closing the connection
            $conn->close();
            (new Products())->productOption();
        }
    }


    //function to fetch products data
    function retriveProduct(){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();

        try{
            //sql statement
            $sql="select * from products";
            $result=$conn->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "\nProduct Id : ".$row["prod_id"].",\nProduct Name : ".$row["name"].",\nProduct Price : ".$row["price"]."\n";
                }
            }
            else{
                echo "\nNo records found\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
        }
        finally{
            //closing the connection
            $conn->close();
        }

        //if condition to check whether session type is admin or not
        if($_SESSION["type"]=="admin")
        {
            (new Products())->productOption();
        }
        else{
            (new Home())->home();
        }
    }

    //function to remove/delete product
    function deleteProduct(String $prod_id){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();

        try{
            //sql statement
            $sql="delete from products where prod_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $prod_id);
            if($stmt->execute()===true){
                echo "\nRecord deleted\n";
            }
            else{
                echo "\nRecord not deleted\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
        }
        finally{
            //closing the statement
            $stmt->close();
            //closing the connection
            $conn->close();
            (new Products())->productOption();
        }
        
    }
}
?>
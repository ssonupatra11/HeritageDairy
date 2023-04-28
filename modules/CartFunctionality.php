<?php 
include_once("../modules/DatabaseConnection.php");
include_once("../public/Home.php");

class CartFunctionality{

    //function to add products to cart
    function addProductsToCart(String $email,String $pid){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
        //try catch to handle sql exception
        try{
            $sql="Insert into cart(uemail,prod_id) values(?,?)";
            $stmt=$conn->prepare($sql);
            $stmt->bind_param("ss",$email,$pid);

            if($stmt->execute()===true){
                echo "\nProduct added to cart\n";
            }
            else{
                echo "\nProduct not added to cart\n";
            }
        }
        catch(mysqli_sql_exception $e){
            throw new mysqli_sql_exception($sql,$e->getMessage(),$e->getCode());
        }
        finally{
            //closing the statement
            if($stmt)
                $stmt->close();
            //closing the connection
            if($conn)
                $conn->close();
            (new Home())->home();
        }
    }

    //function to remove product from cart
    function removeProduct(String $email,String $pid){
         //getting the connection
         $conn=(new DatabaseConnection())->getConnection();
         //try catch to handle sql exception
         try{
             $sql="delete from cart where uemail=? and prod_id=?";
             $stmt=$conn->prepare($sql);
             $stmt->bind_param("ss",$email,$pid);
 
             if($stmt->execute()===true){
                 echo "\nProduct removed from cart\n";
             }
             else{
                 echo "\nProduct not removed from cart\n";
             }
         }
         catch(mysqli_sql_exception $e){
             throw new mysqli_sql_exception($sql,$e->getMessage(),$e->getCode());
         }
         finally{
            //closing the statement
            if($stmt)
                $stmt->close();
            //closing the connection
            if($conn)
                $conn->close();
            (new Home())->home();
         }
    }
     
    //function to view user cart
    function viewUserCartHistory(String $email){
         //getting the connection
         $conn=(new DatabaseConnection())->getConnection();
         //try catch to handle sql exception
         try{
             $sql="select c.uemail,p.prod_id,p.prod_name,p.prod_price from cart c,products p where c.prod_id=p.prod_id";
             $result=$conn->query($sql);
             $count=0;
             if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    if($row["uemail"]==$email){
                        echo "\nUser Email : ".$row["uemail"]."\nProduct Id : ".$row["prod_id"]."\nProduct name : ".$row["prod_name"]."\nProduct Price : ".$row["prod_price"]."\n";
                        $count++;
                    }
                }
             }
             if($count==0){
                echo "\nNo records found\n";
             }
         }
         catch(mysqli_sql_exception $e){
             throw new mysqli_sql_exception($sql,$e->getMessage(),$e->getCode());
         }
         finally{
            //closing the connection
            if($conn)
                $conn->close();
            (new Home())->home();
         }
    }

    
}

?>  
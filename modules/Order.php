<?php 
include_once("../public/Home.php");
include_once("../modules/DatabaseConnection.php");
class Order{
    //function to view User order history
    function viewUserOrderHistory(String $email){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
        //try catch to handle sql exception
        try{
            $sql="select u.name,u.phone,o.user_email,o.prod_id,o.ord_date,p.prod_name,p.prod_price from user u inner join orders o on u.email=o.user_email inner join products p on o.prod_id=p.prod_id";
            $result=$conn->query($sql);
            $count=0;
            if($result->num_rows>0){
               while($row=$result->fetch_assoc()){
                    //if condition match email and show data
                   if($row["user_email"]==$email){
                       echo "\nUser name : ".$row["name"]."\nUser Phone : ".$row["phone"]."\nUser Email : ".$row["user_email"]."\nProduct id : ".$row["prod_id"]."\nOrder date : ".$row["ord_date"]."\nProduct name : ".$row["prod_name"]."\nProduct price : ".$row["prod_price"]."\n";
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
            $conn->close();
            (new Home())->home();
        }
    }

    //function to buy product
    function buyProduct(String $email,String $prod_id){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
        //try catch to handle sql exception
        try{
            $sql_query_1="delete from cart where uemail=? and prod_id=?";
            $stmt=$conn->prepare($sql_query_1);
            $stmt->bind_param("ss",$email,$prod_id);
            if($stmt->execute()==true){
                echo "\nRecord deleted from cart.\n";

                //from this inserting data into order table is done
                $sql_query_2="Insert into orders (user_email,prod_id,ord_date) values (?,?,?)";
                $stmt=$conn->prepare($sql_query_2);
                $todays_date=date("Y-m-d");
                $stmt->bind_param("sss",$email,$prod_id,$todays_date);
                if($stmt->execute()===true){
                    echo "\nProduct bought.\n";
                }
                else{
                    echo "\nProduct not available to buy.\n";
                }
            }
            else{
                echo "\nProduct not available in cart.\n";
            }

        }
        catch(mysqli_sql_exception $e){
            throw new mysqli_sql_exception($sql_query_1,$e->getMessage(),$e->getCode());
            throw new mysqli_sql_exception($sql_query_2,$e->getMessage(),$e->getCode());
        }
        finally{
            //closing statement
            $stmt->close();
            //closing the connection
            $conn->close();
            (new Home())->home();
        }
    }
}
?>
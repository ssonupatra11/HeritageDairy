<?php 
include_once("../public/Products.php");
class AdminFunctionality{
    
    //function to fetch all users order records
    function viewAllOrderHistory(){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();

        //try catch to handle sql exception
        try{
            //sql statement
            $sql="select u.name,u.phone,u.email,o.prod_id,p.prod_name,p.prod_price,o.ord_date from user u inner join orders o on u.email=o.user_email inner join products p on o.prod_id=p.prod_id";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "\nUser name : ".$row["name"]."\nUser Phone : ".$row["phone"]."\nUser email : ".$row["email"]."\nProduct id : ".$row["prod_id"]."\nProduct name : ".$row["prod_name"]."\nProduct Price : ".$row["prod_price"]."\nOrder date : ".$row["ord_date"]."\n";
                }
            }
            else{
                echo "\nNo users order record found.\n";
            }
        }
        catch(mysqli_sql_exception $e){
            throw new mysqli_sql_exception($sql,$e->getMessage(),$e->getCode());
        }
        finally{
            //closing theconnection
            $conn->close();
            (new Products())->productOption();
        }
    }
}

?>
<?php 
include_once("../public/Home.php");
include_once("../modules/DatabaseConnection.php");
include_once("../modules/ExitPage.php");

class AdminLoginFunctionality{

    //function to check admin email and password while login
    function checkAdminLogin(String $aemail,String $apassword){
        $uem=null;
        $nam=null;
        $typ=null;

        //getting the connection 
        $conn=(new DatabaseConnection())->getConnection();

        //try catch to handle sql exception
        try{
            $sql="select name,email,password from admin";

            //result variable holding all records
            $result=$conn->query($sql);

            if($result->num_rows>0){
                //while loop to fetch rows one by one from result variable
                while($row=$result->fetch_assoc()){
                    if($row["email"]==$aemail && $row["password"]==$apassword){
                        $uem=$aemail;
                        $nam=$row["name"];
                        $typ="admin";
                    }
                    elseif($row["email"]===$aemail && $row["password"]!=$apassword){
                        echo "\nPassword is incorrect.Login again!\n";
                        (new Home())->home();
                    }
                }
            }
        }
        catch(mysqli_sql_exception $e){
            throw new mysqli_sql_exception($sql,$e->getMessage(),$e->getCode());
        }
        finally{
            //closing the connection
            $conn->close();
        }
        if($uem!=null && $nam!=null && $typ!=null){
            $_SESSION["email"]=$uem;
            $_SESSION["name"]=$nam;
            $_SESSION["type"]=$typ;
            (new Home())->home();
        }
        else{
            echo "\nAdmin is not available.\n\n";
            (new ExitPage())->exit();
        }        
    }
}
?>
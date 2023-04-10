<?php
include_once("../modules/DatabaseConnection.php");
include_once("../modules/ExitPage.php");
include_once("../public/Home.php");

class LoginFunctionality{
    //function to check login email and password
    public function checkLogin(String $uemail,String $password){
        $uem=null;
        $nam=null;
        $typ=null;

        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();

        //try catch to handle sql exception
        try{
            $sql="Select name,email,password from user";
            //getting records from user table
            $result=$conn->query($sql);
            if($result->num_rows>0){

                //while loop to fetch rows one by one from result variable
                while($row=$result->fetch_assoc()){
                    if($row["email"]===$uemail && $row["password"]===$password){
                        $uem=$uemail;
                        $nam=$row["name"];
                        $typ="user";
                    }
                    elseif($row["email"]===$uemail && $row[2]!=$password){
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
            //closing connection
            $conn->close();
        }

        //if condition to check whether all sessions are null or not
        if($uem!=null && $nam!=null && $typ!=null){
            $_SESSION["email"]=$uem;
            $_SESSION["name"]=$nam;
            $_SESSION["type"]=$typ;
            (new Home())->home();
        }
        else{
            echo "User is not available.Register new User.\n\n";
            (new Register())->addNewUser();
        }
    }
}
?>
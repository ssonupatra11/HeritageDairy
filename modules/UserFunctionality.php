<?php 
include_once("../modules/DatabaseConnection.php");
//include_once("../public/Home.php");
include_once("../public/User.php");
class UserFunctionality{

    //function to insert new user
    public function addNewUser(String $name,String $email,String $phone,String $age,String $gender,String $password){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
        try{
            //sql statement
            $sql="Insert into user (name,email,phone,age,gender,password) values (?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $name, $email, $phone,$age,$gender,$password);
            if($stmt->execute()===true){
                echo "\nUser Registered\n";
            }
            else{
                echo "\nNot registered\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
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

    //function to update user name
    function updateUserName(String $email,String $new_uname){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
        try{
            //sql statement
            $sql="update user set name=? where email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_uname, $email);
            if($stmt->execute()===true){
                echo "\nUsername updated\n";
                $_SESSION["name"]=$new_uname;
            }
            else{
                echo "\nUsername not updated\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
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

    //function to update user email id
    function updateUserEmail(String $email,String $new_email){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
        try{
            //sql statement
            $sql="update user set email=? where email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_email, $email);
            if($stmt->execute()===true){
                echo "\nEmail updated\n";
            }
            else{
                echo "\nEmail not updated\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
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

    //function to update user age
    function updateUserAge(String $email,String $new_age){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
        try{
            //sql statement
            $sql="update user set age=? where email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_age, $email);
            if($stmt->execute()===true){
                echo "\nAge updated\n";
            }
            else{
                echo "\nAge not updated\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
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

    //function to update user phone number
    function updateUserPhone(String $email,String $new_phone){
       //getting the connection
       $conn=(new DatabaseConnection())->getConnection();
       try{
           //sql statement
           $sql="update user set phone=? where email=?";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param("ss", $new_phone, $email);
           if($stmt->execute()===true){
               echo "\nUser phone number updated\n";
           }
           else{
               echo "\nUser phone number not updated\n";
           }
       }
       catch(mysqli_sql_exception $e){
          throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
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

    //function to update user gender
    function updateUserGender(String $email,String $new_gender){
       //getting the connection
       $conn=(new DatabaseConnection())->getConnection();
       try{
           //sql statement
           $sql="update user set gender=? where email=?";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param("ss", $new_gender, $email);
           if($stmt->execute()===true){
               echo "\nGender updated\n";
           }
           else{
               echo "\nGender not updated\n";
           }
       }
       catch(mysqli_sql_exception $e){
          throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
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

    //function to update user password
    function updateUserPassword(String $email,String $new_password){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
        try{
            //sql statement
            $sql="update user set password=? where email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_password, $email);
            if($stmt->execute()===true){
                echo "\nPassword updated\n";
            }
            else{
                echo "\nPassword not updated\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
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

    //function to view user data/profile
    function viewProfile(String $email){
        //getting the connection
        $conn=(new DatabaseConnection())->getConnection();
        try{
            //sql statement
            $sql="select name,email,phone,age,gender from user";
            //variable result to store records
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    if($row["email"]===$email)
                        echo "Name:".$row["name"].", Email:".$row["email"].", Phone:".$row["phone"].", Age:".$row["age"].", Gender:".$row["gender"];
                }
            }else{
                echo "\nNo records found\n";
            }
        }
        catch(mysqli_sql_exception $e){
           throw new mysqli_sql_exception($sql, $e->getMessage(), $e->getCode());
        }
        finally{
            //closing the connection
            if($conn)
                $conn->close();
            (new Home())->home();
        }
    }


    //function to delete user
    function deleteUser(String $email){
        //getting the connection
       $conn=(new DatabaseConnection())->getConnection();
       try{
           //sql statement
           $sql="delete from user where email=?";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param("s", $email);
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
           if($stmt)
               $stmt->close();
           //closing the connection
           if($conn)
               $conn->close();
           (new ExitPage())->exit();
       }
    }
}

?>
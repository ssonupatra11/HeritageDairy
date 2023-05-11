<?php 

class UserFunctionality{


    /**
     * @var PDO/null
     */
    private ?PDO $conn=null;

    /**
     * @var string/null
     */
    private ?string $sql=null;


    //function to insert new user
    public function addNewUser(String $name,String $email,String $phone,String $age,String $gender,String $password) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql="Insert into user (name,email,phone,age,gender,password) values (:name,:email,:phone,:age,:gender,:password)";
            $statement = $this->conn->prepare($this->sql);

            if($statement->execute([':name' => $name,':email' => $email,':phone' => $phone,':age' => $age,':gender' => $gender,':password' => $password])){
                echo "User Registered",PHP_EOL;
            }
            else{
                    echo "User not registered",PHP_EOL;
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
            // if($this->conn)
            //     $this->conn->close();
            $GLOBALS['home']->home();
        }
    }

    //function to update user name
    public function updateUserName(String $email,String $new_uname) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql="update user set name=:new_name where email=:email";

            // prepare statement
            $statement = $this->conn->prepare($this->sql);

            // bind params
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':new_name',$new_uname ,PDO::PARAM_STR);
            
            // execute the UPDATE statment
            if ($statement->execute()) {
	            echo "Username updated",PHP_EOL;
                $_SESSION["name"]=$new_uname;
            }
            else{
                    echo "Username not updated",PHP_EOL;
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
            // if($this->conn)
            //     $this->conn->close();
            $GLOBALS['home']->home();
        }
    }

    //function to update user email id
    public function updateUserEmail(String $email,String $new_email) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql="update user set email=:new_email where email=:email";
            // prepare statement
            $statement = $this->conn->prepare($this->sql);

            // bind params
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':new_email',$new_email ,PDO::PARAM_STR);
            
            // execute the UPDATE statment
            if ($statement->execute()) {
	            echo "Email updated",PHP_EOL;
            }
            else{
                echo "Email not updated",PHP_EOL;
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
            // if($this->conn)
            //     $this->conn->close();
            $GLOBALS['home']->home();
        }
    }

    //function to update user age
    public function updateUserAge(String $email,String $new_age) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql="update user set age=:new_age where email=:email";
            // prepare statement
            $statement = $this->conn->prepare($this->sql);

            // bind params
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':new_age',$new_age ,PDO::PARAM_STR);
            
            // execute the UPDATE statment
            if ($statement->execute()) {
	            echo "Age updated",PHP_EOL;
            }
            else{
                echo "Age not updated",PHP_EOL;
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
            // if($this->conn)
            //     $this->conn->close();
            $GLOBALS['home']->home();
        }
    }

    //function to update user phone number
    public function updateUserPhone(String $email,String $new_phone) : void{
       //getting the connection
       $this->conn=DatabaseConnection::getConnection();
       try{
           //sql statement
           $this->sql="update user set phone=:new_phone where email=:email";
           // prepare statement
           $statement = $this->conn->prepare($this->sql);

           // bind params
           $statement->bindParam(':email', $email, PDO::PARAM_STR);
           $statement->bindParam(':new_phone',$new_phone ,PDO::PARAM_STR);
           
           // execute the UPDATE statment
           if ($statement->execute()) {
               echo "User phone number updated",PHP_EOL;
           }
           else{
               echo "User phone number not updated",PHP_EOL;
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
            // if($this->conn)
            //     $this->conn->close();
            $GLOBALS['home']->home();
       }
    }

    //function to update user gender
    public function updateUserGender(String $email,String $new_gender) : void{
       //getting the connection
       $this->conn=DatabaseConnection::getConnection();
       try{
           //sql statement
           $this->sql="update user set gender=:new_gender where email=:email";
           // prepare statement
           $statement = $this->conn->prepare($this->sql);

           // bind params
           $statement->bindParam(':email', $email, PDO::PARAM_STR);
           $statement->bindParam(':new_gender',$new_gender ,PDO::PARAM_STR);
           
           // execute the UPDATE statment
           if ($statement->execute()) {
               echo "Gender updated",PHP_EOL;
           }
           else{
               echo "Gender not updated",PHP_EOL;
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
            // if($this->conn)
            //    $this->conn->close();
            $GLOBALS['home']->home();
       }
    }

    //function to update user password
    public function updateUserPassword(String $email,String $new_password) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql="update user set password=:new_password where email=:email";
            // prepare statement
            $statement = $this->conn->prepare($this->sql);

            // bind params
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':new_password',$new_password ,PDO::PARAM_STR);
            
            // execute the UPDATE statment
            if ($statement->execute()) {
	            echo "Password updated",PHP_EOL;
            }
            else{
                echo "Password not updated",PHP_EOL;
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
            // if($this->conn)
            //     $this->conn->close();
            $GLOBALS['home']->home();
        }
    
    }

    //function to view user data/profile
    public function viewProfile(String $email) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql="select name,email,phone,age,gender from user";
            
            $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
	            // show the rows
	            foreach ($rows as $row) {
                    if($row["email"]===$email)
                        echo "Name:".$row["name"].", Email:".$row["email"].", Phone:".$row["phone"].", Age:".$row["age"].", Gender:".$row["gender"],PHP_EOL,PHP_EOL;
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
            // if($this->conn)
            //     $this->conn->close();
            $GLOBALS['home']->home();
        }
    }


    //function to delete user
    public function deleteUser(String $email) : void{
        //getting the connection
       $this->conn=DatabaseConnection::getConnection();
       try{
           //sql statement
           $this->sql="delete from user where email=email";

           $statement = $this->conn->prepare($this->sql);
             $statement->bindParam(':email', $email, PDO::PARAM_STR);

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
        //    if($this->conn)
        //        $this->conn->close();
           $GLOBALS['exit']->exit();
       }
    }
}

?>
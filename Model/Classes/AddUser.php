<?php 

/**
 * This class has functionalities to add user.
 */
class AddUser implements AddUserInterface{

    use LogMsg;

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
     * This function used to insert new user.
     * 
     * @access public
     * 
     * @param string $name
     * 
     * @param string $email
     * 
     * @param string $phone
     * 
     * @param string $age
     * 
     * @param string $gender
     * 
     * @param string $password
     * 
     * @return void
     */
    public function addNewUser(String $name,String $email,String $phone,String $age,String $gender,String $password) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql="Insert into user (name,email,phone,age,gender,password) values (:name,:email,:phone,:age,:gender,:password)";
            $statement = $this->conn->prepare($this->sql);

            if($statement->execute([':name' => $name,':email' => $email,':phone' => $phone,':age' => $age,':gender' => $gender,':password' => $password])){
                $this->log("User Registered");
            }
            else{
                    $this->log("User Not Registered");
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

}

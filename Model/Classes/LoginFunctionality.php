<?php
/**
 * This class has a functionality to login user.
 */
class LoginFunctionality{

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
     * This function check's user email and password while logging in.
     * 
     * @access public
     * 
     * @param string $uemail,@param string $password
     * 
     * @return void
     */
    public function checkLogin(String $uemail,String $password) : void{
       /**
         * @var null
         */
        $uem=null;
        /**
         * @var null
         */
        $nam=null;
        /**
         * @var null
         */
        $typ=null;

        //getting the connection
        $this->conn=DatabaseConnection::getConnection();

        //try catch to handle sql exception
        try{
            $this->sql="Select name,email,password from user";

            $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
	            // fetch all the rows one by one
	            foreach ($rows as $row) {
                    if($row["email"]===$uemail && $row["password"]===$password){
                        $uem=$uemail;
                        $nam=$row["name"];
                        $typ="user";
                    }
                    elseif($row["email"]===$uemail && $row["password"]!=$password){
                        echo "Password is incorrect.Login again!",PHP_EOL;
                        $GLOBALS['home']->home();
                    }
                    elseif($row["email"]!=$uemail && $row["password"]===$password){
                        echo "Email is incorrect.Login again!",PHP_EOL;
                        $GLOBALS['home']->home();
                    }
        	    }
            }
        }
        catch(PDOException $e){
            echo "Error".$e;
        }
        finally{
            //closing connection
            // if($conn)
            //     $conn->close();
        }

        //if condition to check whether all sessions are null or not
        if(isset($uem) && isset($nam) && isset($typ)){
            $_SESSION["email"]=$uem;
            $_SESSION["name"]=$nam;
            $_SESSION["type"]=$typ;
            $GLOBALS['home']->home();
        }
        else{
            echo "User is not available.Register new User.",PHP_EOL;
            $GLOBALS['register']->addNewUser();
        }
    }
}
<?php 

namespace Sonu\HeritageDairy\Model\Classes;

use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;
use \PDO;
use \PDOException;
/**
 * This class has a functionality to login admin.
 */
class AdminLoginFunctionality{

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
     * This function check's admin email and password while logging in.
     * 
     * @access public
     * 
     * @param string $aemail,@param string $apassword
     * 
     * @return void
     */
    public function checkAdminLogin(String $aemail,String $apassword) : void{
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
            $this->sql="select name,email,password from admin";

            $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
	            // fetch all the rows one by one
	            foreach ($rows as $row) {
                    if($row["email"]===$aemail && $row["password"]===$apassword){
                        $uem=$aemail;
                        $nam=$row["name"];
                        $typ="admin";
                    }
                    elseif($row["email"]===$aemail && $row["password"]!=$apassword){
                        echo PHP_EOL,"Password is incorrect.Login again!",PHP_EOL;
                        $GLOBALS['home']->home();
                    }
                    elseif($row["email"]!=$aemail && $row["password"]===$apassword){
                        echo PHP_EOL,"Email is incorrect.Login again!",PHP_EOL;
                        $GLOBALS['home']->home();
                    }
        	    }
            }
        }
        catch(PDOException $e){
            echo "Error".$e;
        }
        finally{
            //closing the connection
            // if($conn)
            //     $conn->close();
        }
        if(isset($uem) && isset($nam) && isset($typ)){
            $_SESSION["email"]=$uem;
            $_SESSION["name"]=$nam;
            $_SESSION["type"]=$typ;
            $GLOBALS['home']->home();
        }
        else{
            echo "Admin is not available.",PHP_EOL;
            $GLOBALS['exit']->exit();
        }        
    }
}
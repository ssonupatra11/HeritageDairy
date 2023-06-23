<?php 

namespace Sonu\HeritageDairy\Model\Classes;

use \PDO;
use \PDOException;
use Sonu\HeritageDairy\Model\Interfaces\UpdateUserPasswordInterface;
use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;
use Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder;
use Sonu\HeritageDairy\Model\Classes\MysqlQueryBuilder;

/**
 * This class has functionalities to update user password.
 */
class UpdateUserPassword implements UpdateUserPasswordInterface{

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
     * This function gets the query string
     * 
     * @access private
     * 
     * @return string
     * 
     * @param \Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder $queryBuilder
     */

     private function getQuery(SQLQueryBuilder $queryBuilder):string
     {
      $query = $queryBuilder
     ->update("user","password",":new_password")
     ->where("email",":email")
     ->getSQL();
         return $query;
     }

    /**
     * This function used to update user password.
     * 
     * @access public
     * 
     * @param string $email
     * 
     * @param string $new_password
     * 
     * @return void
     */
    public function updateUserPassword(String $email,String $new_password) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql=$this->getQuery(new MysqlQueryBuilder);
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

}

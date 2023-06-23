<?php 

namespace Sonu\HeritageDairy\Model\Classes;

use Sonu\HeritageDairy\Model\Interfaces\ViewData;
use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;
use Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder;
use Sonu\HeritageDairy\Model\Classes\MysqlQueryBuilder;

use \PDO;

use \PDOException;


/**
 * This class has functionalities to view user profile/data.
 */
class ViewUserProfile implements ViewData{

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
     * @param SQLQueryBuilder
     */

     private function getQuery(SQLQueryBuilder $queryBuilder):string
     {
      $query = $queryBuilder
     ->select("user",['name','email','phone','age','gender'])
     ->getSQL();
         return $query;
     }

    /**
     * This function used to view user profile.
     * 
     * @access public
     * 
     * @param string $email
     * 
     * @return void
     */
    public function view() : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql=$this->getQuery(new MysqlQueryBuilder);
            
            $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
	            // show the rows
	            foreach ($rows as $row) {
                    if($row["email"]===$_SESSION['email'])
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

}

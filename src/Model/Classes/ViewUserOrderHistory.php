<?php 

namespace Sonu\HeritageDairy\Model\Classes;

use \PDO;
use \PDOException;
use Sonu\HeritageDairy\Model\Interfaces\ViewData;
use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;


/**
 * This class has functionalities to view user order history.
 */
class ViewUserOrderHistory implements ViewData{

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
     * This function used to view User order history.
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
        //try catch to handle sql exception
        try{
            $this->sql="select u.name,u.phone,o.user_email,o.prod_id,o.ord_date,p.prod_name,p.prod_price from user u inner join orders o on u.email=o.user_email inner join products p on o.prod_id=p.prod_id";
            $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            $count=0;
            if ($rows) {

	            // show the rows
	            foreach ($rows as $row) {
                    
                    //if condition match email and show data
                   if($row["user_email"]===$_SESSION['email']){
                       echo "User name : ".$row["name"]."\nUser Phone : ".$row["phone"]."\nUser Email : ".$row["user_email"]."\nProduct id : ".$row["prod_id"]."\nOrder date : ".$row["ord_date"]."\nProduct name : ".$row["prod_name"]."\nProduct price : ".$row["prod_price"],PHP_EOL,PHP_EOL;
                       $count++;
                   }
        	    }
            }
            if($count===0){
               echo "No records found",PHP_EOL;
            }
        }
        catch(PDOException $e){
            echo "Error".$e;
        }
        finally{
            //closing the connection
            // if($conn)
            //     $conn->close();
            $GLOBALS['home']->home();
        }
    }
}
<?php 

namespace Sonu\HeritageDairy\Model\Classes;

use \PDO;
use \PDOException;

use Sonu\HeritageDairy\Model\Interfaces\ViewData;
use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;


/**
 * This class has functionalities to view orders in cart.
 */
class ViewUserCartHistory implements ViewData{
    
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
     * This function is used to view products added in cart.
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
             $this->sql="select c.uemail,p.prod_id,p.prod_name,p.prod_price from cart c,products p where c.prod_id=p.prod_id";
             $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            $count=0;

            if ($rows) {
	            // show the rows
	            foreach ($rows as $row) {
                    if($row["uemail"]==$_SESSION['email']){
                        echo "User Email : ".$row["uemail"]."\nProduct Id : ".$row["prod_id"]."\nProduct name : ".$row["prod_name"]."\nProduct Price : ".$row["prod_price"],PHP_EOL,PHP_EOL;
                        $count++;
                    }
        	    }
            }
            if($count==0){
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

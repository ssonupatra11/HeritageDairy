<?php 
/**
 * This class has functionalities to update user email.
 */
class UpdateUserEmail implements UpdateUserEmailInterface{

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
     ->update("user","email",":new_email")
     ->where("email",":email")
     ->getSQL();
         return $query;
     }

    /**
     * This function used to update email id.
     * 
     * @access public
     * 
     * @param string $email
     * 
     * @param string $new_email
     * 
     * @return void
     */
    public function updateUserEmail(String $email,String $new_email) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql=$this->getQuery(new MysqlQueryBuilder);
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

}

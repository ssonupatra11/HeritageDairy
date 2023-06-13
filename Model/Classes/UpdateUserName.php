<?php 
/**
 * This class has functionalities to update user name.
 */
class UpdateUserName implements UpdateUserNameInterface{

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
     ->update("user","name",":new_name")
     ->where("email",":email")
     ->getSQL();
         return $query;
     }

    /**
     * This function used to update user name.
     * 
     * @access public
     * 
     * @param string $email
     * 
     * @param string $new_uname
     * 
     * @return void
     */
    public function updateUserName(String $email,String $new_uname) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
        try{
            //sql statement
            $this->sql=$this->getQuery(new MysqlQueryBuilder);

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

}

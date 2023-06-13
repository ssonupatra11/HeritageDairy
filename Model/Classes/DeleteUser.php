<?php 
/**
 * This class has functionalities to delete user.
 */
class DeleteUser implements DeleteUserInterface{

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
      ->delete("user")
      ->where("email",":email")
     ->getSQL();
         return $query;
     }

    /**
     * This function used to delete user.
     * 
     * @access public
     * 
     * @param string $email
     * 
     * @return void
     */
    public function deleteUser(String $email) : void{
        //getting the connection
       $this->conn=DatabaseConnection::getConnection();
       try{
           //sql statement
        $this->sql=$this->getQuery(new MysqlQueryBuilder);

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

<?php 
/**
 * This class has functionality to delete product.
 */
class DeleteProduct implements DeleteProd{

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
     ->delete("products")
     ->where("prod_id",":prod_id")
     ->getSQL();
         return $query;
     }

    /**
     * This function used to delete product.
     * 
     * @access public
     * 
     * @param string $prod_id
     * 
     * @return void
     */
    public function deleteProduct(String $prod_id) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();

        try{
            //sql statement
            $this->sql=$this->getQuery(new MysqlQueryBuilder);
            $statement = $this->conn->prepare($this->sql);
            $statement->bindParam(':prod_id',$prod_id,PDO::PARAM_STR);
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
            // if($conn)
            //     $conn->close();
            $GLOBALS['product']->productOption();
        }
        
    }
}
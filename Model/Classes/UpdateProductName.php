<?php 

/**
 * This class has functionality to update product name.
 */
class UpdateProductName implements UpdateProdName{

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
     ->update("products","prod_name",":new_pname")
     ->where("prod_id",":prod_id")
     ->getSQL();
         return $query;
     }

    /**
     * This function used to update product name.
     * 
     * @access public
     * 
     * @param string $prod_id
     * 
     * @param string $new_pname
     * 
     * @return void
     */
    public function updateProductName(String $prod_id,String $new_pname) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();
    
        try{
            //sql statement
            $this->sql=$this->getQuery(new MysqlQueryBuilder);
            // prepare statement
            $statement = $this->conn->prepare($this->sql);

            // bind params
            $statement->bindParam(':prod_id', $prod_id, PDO::PARAM_STR);
            $statement->bindParam(':new_pname',$new_pname ,PDO::PARAM_STR);
            
            // execute the UPDATE statment
            if ($statement->execute()) {
	            echo "Product name updated",PHP_EOL;
            }
            else{
                echo "Product name not updated",PHP_EOL;
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
<?php 
/**
 * This class has functionalities to view all products available.
 */
class ViewAllProducts implements ViewData{

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
        ->selectAll("products")
        ->getSQL();
            return $query;
        }

    /**
     * This function used to view all products.
     * 
     * @access public
     * 
     * @return void
     */
    public function view() :void {
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();

        try{
            echo "All products list!",PHP_EOL;
            //sql statement
            $this->sql=$this->getQuery(new MysqlQueryBuilder);
            $statement = $this->conn->query($this->sql);

            // get all rows
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
	            // show the rows
	            foreach ($rows as $row) {
                    echo "Product Id : ".$row["prod_id"].",\nProduct Name : ".$row["prod_name"].",\nProduct Price : ".$row["prod_price"],PHP_EOL,PHP_EOL;
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
            // if($conn)
            //     $conn->close();
        }

        //if condition to check whether session type is admin or not
        if(isset($_SESSION["type"]) && $_SESSION["type"]==="admin")
        {
            $GLOBALS['product']->productOption();
        }
        else{
            $GLOBALS['home']->home();
        }
    }

}
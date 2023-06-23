<?php 

namespace Sonu\HeritageDairy\Model\Classes;


use Sonu\HeritageDairy\Model\Interfaces\UpdateProdPrice;
use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;
use Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder;
use Sonu\HeritageDairy\Model\Classes\MysqlQueryBuilder;
use \PDO;
use \PDOException;

/**
 * This class has functionality to update product price.
 */
class UpdateProductPrice implements UpdateProdPrice{

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
     ->update("products","prod_price",":new_price")
     ->where("prod_id",":prod_id")
     ->getSQL();
         return $query;
     }

    /**
     * This function used to update product price.
     * 
     * @access public
     * 
     * @param string $prod_id
     * 
     * @param string $new_pprice
     * 
     * @return void
     */
    public function updateProductPrice(String $prod_id,String $new_pprice) : void{
        //getting the connection
        $this->conn=DatabaseConnection::getConnection();

        try{
            //sql statement
            $this->sql=$this->getQuery(new MysqlQueryBuilder);
            
            // prepare statement
            $statement = $this->conn->prepare($this->sql);

            // bind params
            $statement->bindParam(':prod_id', $prod_id, PDO::PARAM_STR);
            $statement->bindParam(':new_price',$new_pprice ,PDO::PARAM_STR);
            
            // execute the UPDATE statment
            if ($statement->execute()) {
	            echo "Product price updated",PHP_EOL;
            }
            else{
                echo "Product price not updated",PHP_EOL;
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
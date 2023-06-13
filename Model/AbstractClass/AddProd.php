<?php 
/**
 * This Abstract class has a addNewProduct() method declared.
 */
abstract class AddProd{
    /**
     * This method will be implemented by the class which extends AddProd.
     * 
     * @access public
     * 
     * @return void
     */
    abstract public function addNewProduct(String $prod_id,String $pname,String $pprice) : void;
}
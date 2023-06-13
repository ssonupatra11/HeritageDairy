<?php 
/**
 * This interface has a deleteProduct() method declared.
 */
interface DeleteProd{
    /**
     * This method will be implemented by the class which implements DeleteProd.
     * 
     * @access public
     * 
     * @return void
     */
    public function deleteProduct(String $prod_id) : void;
}
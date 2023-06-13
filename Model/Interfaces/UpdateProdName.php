<?php 
/**
 * This interface has a updateProductName() method declared.
 */
interface UpdateProdName{
    /**
     * This method will be implemented by the class which implements UpdateProdName.
     * 
     * @access public
     * 
     * @return void
     */
    public function updateProductName(String $prod_id,String $new_pname) : void;
}
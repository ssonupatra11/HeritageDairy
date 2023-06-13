<?php 
/**
 * This interface has a updateProductPrice() method declared.
 */
interface UpdateProdPrice{
    /**
     * This method will be implemented by the class which implements UpdateProdPrice.
     * 
     * @access public
     * 
     * @return void
     */
    public function updateProductPrice(String $prod_id,String $new_pprice) : void;
}
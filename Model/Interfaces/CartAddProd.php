<?php 
/**
 * This interface has a addProductsToCart() method declared.
 */
interface CartAddProd{
    /**
     * This method will be implemented by the class which implements CartAddProd.
     * 
     * @access public
     * 
     * @return void
     */
    public function addProductsToCart(String $email,String $pid) : void;
}
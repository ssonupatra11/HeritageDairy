<?php 
/**
 * This interface has a buyProduct() method declared.
 */
interface BuyProd{
    /**
     * This method will be implemented by the class which implements BuyProd.
     * 
     * @access public
     * 
     * @return void
     */
    public function buyProduct(String $email,String $prod_id):void;
}
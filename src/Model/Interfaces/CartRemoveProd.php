<?php 

namespace Sonu\HeritageDairy\Model\Interfaces;

/**
 * This interface has a removeProduct() method declared.
 */
interface CartRemoveProd{
    /**
     * This method will be implemented by the class which implements CartRemoveProd.
     * 
     * @access public
     * 
     * @return void
     */
    public function removeProduct(String $email,String $pid) : void;
}
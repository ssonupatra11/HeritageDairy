<?php 

namespace Sonu\HeritageDairy\Model\Interfaces;

/**
 * This interface has a updateUserPhone() method declared.
 */
interface UpdateUserPhoneInterface{
    /**
     * This method will be implemented by the class which implements UpdateUserPhoneInterface.
     * 
     * @access public
     * 
     * @return void
     */
    public function updateUserPhone(String $email,String $new_phone) : void;
}
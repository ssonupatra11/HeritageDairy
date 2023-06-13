<?php 
/**
 * This interface has a updateUserPassword() method declared.
 */
interface UpdateUserPasswordInterface{
    /**
     * This method will be implemented by the class which implements UpdateUserPasswordInterface.
     * 
     * @access public
     * 
     * @return void
     */
    public function updateUserPassword(String $email,String $new_password) : void;
}
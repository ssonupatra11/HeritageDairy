<?php 
/**
 * This interface has a updateUserName() method declared.
 */
interface UpdateUserNameInterface{
    /**
     * This method will be implemented by the class which implements UpdateUserNameInterface.
     * 
     * @access public
     * 
     * @return void
     */
    public function updateUserName(String $email,String $new_uname) : void;
}
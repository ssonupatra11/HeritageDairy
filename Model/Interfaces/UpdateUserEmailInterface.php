<?php 
/**
 * This interface has updateUserEmail() method declared.
 */
interface UpdateUserEmailInterface{
    /**
     * This method will be implemented by the class which implements UpdateUserEmailInterface.
     * 
     * @access public
     * 
     * @return void
     */
    public function updateUserEmail(String $email,String $new_email) : void;
}
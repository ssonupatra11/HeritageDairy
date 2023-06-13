<?php 
/**
 * This interface has a updateUserAge() method declared.
 */
interface UpdateUserAgeInterface{
    /**
     * This method will be implemented by the class which implements UpdateUserAgeInterface.
     * 
     * @access public
     * 
     * @return void
     */
    public function updateUserAge(String $email,String $new_age) : void;
}
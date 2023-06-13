<?php 
/**
 * This interface has a updateUserGender() method declared.
 */
interface UpdateUserGenderInterface{
    /**
     * This method will be implemented by the class which implements UpdateUserGenderInterface.
     * 
     * @access public
     * 
     * @return void
     */
    public function updateUserGender(String $email,String $new_gender) : void;
}
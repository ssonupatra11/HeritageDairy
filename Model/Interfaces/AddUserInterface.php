<?php 
/**
 * This interface has a addNewUser() method declared.
 */
interface AddUserinterface{
    /**
     * This method will be implemented by the class which implements AddUserInterface.
     * 
     * @access public
     * 
     * @return void
     */
    public function addNewUser(String $name,String $email,String $phone,String $age,String $gender,String $password) : void;
}
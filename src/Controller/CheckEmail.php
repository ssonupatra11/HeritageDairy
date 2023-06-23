<?php

namespace Sonu\HeritageDairy\Controller;

/**
 * This class has a function to check email format.
 */
class CheckEmail{

    //Destructor is called when there is no reference to its object
    function __destruct(){}

    /**
     * This function takes email as argument and check whether email is in correct format.
     * 
     * @access public
     * 
     * @param string $email
     * 
     * @return int
     */
    public function checkEmailFormat(String $email) : int{
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return 0;
        }
        return 1;
    }
}
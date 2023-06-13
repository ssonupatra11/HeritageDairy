<?php
/**
 * This class has functionalities to check password format and check passwords are matching or not.
 */
class CheckPassword{


    //Destructor is called when there is no reference to its object
    function __destruct(){}

    /**
     * This function check whether password is in correct format or not.
     * 
     * @access public
     * 
     * @param string $password
     * 
     * @return int
     */
    public function checkPasswordFormat(String $password) : int{
        /**
         * @var string
         */
        $pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        if(preg_match($pattern,$password)){
            return 0;
        }
        return 1;
    }

    /**
     * This function matchs old and new password.
     * 
     * @access public
     * 
     * @param string $old_password,@param string $new_password
     * 
     * @return int
     */
    public function matchPassword(String $old_password,String $new_password) : int{
        if($old_password===$new_password){
            return 1;
        }
        return 0;
    }
}
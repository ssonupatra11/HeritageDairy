<?php

//using Autoload to include classes Automatically if currently not defined
spl_autoload_register(function ($class_name){
    include $class_name.'.php';
});

/**
 * This class provides a function to read admin data for login
 */
class AdminLogin{    

    //Destructor is called when there is no reference to its object
    function __destruct(){}

    /**
     * This function takes email and password of admin as command line input and call checkAdminLogin() to login.
     * 
     * @access public
     * 
     * @return void
     */
    public function readAdminLoginData() : void{
        /**
         * @var mixed
         */
        $admin_login_func_obj=new AdminLoginFunctionality();
        /**
         * @var string
         */
        $aemail=(string)readline("Enter your email : ");
        /**
         * @var string
         */
        $apassw=(string)readline("Enter your password : ");
        $admin_login_func_obj->checkAdminLogin($aemail,$apassw);
    }     
}
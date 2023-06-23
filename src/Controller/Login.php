<?php

namespace Sonu\HeritageDairy\Controller;

use Sonu\HeritageDairy\Model\Classes\LoginFunctionality;

/**
 * This is a anonymous class assigned to a variable via defined function.
 * This class provides a function to read user data for login
 */

 $Login=getLoginClassObj();
/**
 * This is a function which returns anonymous class instance.
 */
 function getLoginClassObj(){
    return new class{


        //Destructor is called when there is no reference to its object
        function __destruct(){}

        /**
         * This function takes email and password of user as command line input and call checkLogin() to login.
         * 
         * @access public
         * 
         * @return void
         */
        public function readLoginData() : void{
            /**
             * @var mixed
             */
            $login_func_obj=new LoginFunctionality();
            /**
             * @var string
             */
            $uemail=(string)readline("Enter your email : ");
            /**
             * @var string
             */
            $passw=(string)readline("Enter your password : ");
            $login_func_obj->checkLogin($uemail,$passw);
        }     
    };
 }


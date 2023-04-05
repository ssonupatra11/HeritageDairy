<?php
include_once("../modules/LoginFunctionality.php");
class Login{
    function readLoginData(){
        $login_func_obj=new LoginFunctionality();
        $uemail=readline("Enter your email : ");
        $passw=readline("Enter your password : ");
        echo $login_func_obj->checkLogin($uemail,$passw);
    }     
}

?>
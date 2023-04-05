<?php
include_once("../modules/AdminLoginFunctionality.php");
class AdminLogin{
    function readAdminLoginData(){
        $admin_login_func_obj=new AdminLoginFunctionality();
        $aemail=readline("Enter your email : ");
        $apassw=readline("Enter your password : ");
        $admin_login_func_obj->checkAdminLogin($aemail,$apassw);
    }     
}
?>
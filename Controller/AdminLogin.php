<?php
class AdminLogin{
    public function readAdminLoginData() : void{
        $admin_login_func_obj=new AdminLoginFunctionality();
        $aemail=(string)readline("Enter your email : ");
        $apassw=(string)readline("Enter your password : ");
        $admin_login_func_obj->checkAdminLogin($aemail,$apassw);
    }     
}
?>
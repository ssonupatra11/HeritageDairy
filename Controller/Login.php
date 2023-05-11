<?php
class Login{
    public function readLoginData() : void{
        $login_func_obj=new LoginFunctionality();
        $uemail=(string)readline("Enter your email : ");
        $passw=(string)readline("Enter your password : ");
        $login_func_obj->checkLogin($uemail,$passw);
    }     
}

?>
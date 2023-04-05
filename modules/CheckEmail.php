<?php
class CheckEmail{
    function checkEmailFormat(String $email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return 0;
        }
        return 1;
    }
}
// $val=new CheckEmail();
// echo $val->checkEmailFormat("roshni@gmail.com");
?>
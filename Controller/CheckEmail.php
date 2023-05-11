<?php
class CheckEmail{
    public function checkEmailFormat(String $email) : int{
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return 0;
        }
        return 1;
    }
}
?>
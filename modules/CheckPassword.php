<?php
class CheckPassword{
    function checkPasswordFormat(String $password){
        $pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        if(preg_match($pattern,$password)){
            return 0;
        }
        return 1;
    }

    function matchPassword(String $old_password,String $new_password){
        if($old_password===$new_password){
            return 1;
        }
        return 0;
    }
}
?>
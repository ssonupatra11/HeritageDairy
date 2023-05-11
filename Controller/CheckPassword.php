<?php
class CheckPassword{
    public function checkPasswordFormat(String $password) : int{
        $pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        if(preg_match($pattern,$password)){
            return 0;
        }
        return 1;
    }

    public function matchPassword(String $old_password,String $new_password) : int{
        if($old_password===$new_password){
            return 1;
        }
        return 0;
    }
}
?>
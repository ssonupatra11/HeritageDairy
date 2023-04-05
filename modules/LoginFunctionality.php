<?php
include_once("../public/Home.php");
class LoginFunctionality{
    public function checkLogin(String $uemail,String $password){
        $user_file=fopen("C:\Users\Dell\Desktop\HeritageDairy\modules\userdata.txt","r");
        if(filesize("C:\Users\Dell\Desktop\HeritageDairy\modules\userdata.txt")>0){
            $content=explode(",",fread($user_file,filesize("C:\Users\Dell\Desktop\HeritageDairy\modules\userdata.txt")));
        }
        fclose($user_file);
        $uem=null;
        $nam=null;
        $typ=null;
        foreach($content as $val)
        {
            if(strlen($val)>0){
                $v=explode(" ",$val);
                if($v[1]===$uemail && $v[5]===$password){
                    $uem=$uemail;
                    $nam=$v[0];
                    $typ="user";
                }
                elseif($v[1]===$uemail && $v[5]!=$password){
                    echo "\nPassword is incorrect.Login again!\n";
                    (new Home())->home();
                }
            }
        }
        if($uem!=null && $nam!=null && $typ!=null){
            $_SESSION["email"]=$uem;
            $_SESSION["name"]=$nam;
            $_SESSION["type"]=$typ;
            (new Home())->home();
        }
        else{
            echo "User is not available.Register new User.\n\n";
            (new Register())->addNewUser();
        }


    }
}
?>
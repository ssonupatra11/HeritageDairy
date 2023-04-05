<?php 
$admin_data_path="C:\Users\Dell\Desktop\HeritageDairy\modules\admindata.txt";
class AdminLoginFunctionality{
    function checkAdminLogin(String $aemail,String $apassword){
        $user_file=fopen($GLOBALS["admin_data_path"],"r");
        if(filesize($GLOBALS["admin_data_path"])>0){
            $content=explode(",",fread($user_file,filesize($GLOBALS["admin_data_path"])));
        }
        fclose($user_file);
        $uem=null;
        $nam=null;
        $typ=null;
        foreach($content as $val)
        {
            if(strlen($val)>0){
                $v=explode(" ",$val);
                if($v[1]===$aemail && $v[2]===$apassword){
                    $uem=$aemail;
                    $nam=$v[0];
                    $typ="admin";
                }
                elseif($v[1]===$aemail && $v[2]!=$apassword){
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
            echo "Admin is not available.\n\n";
            (new ExitPage())->exit();
        }
    }
}
?>